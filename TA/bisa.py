import datetime
import sqlite3
import threading
import tkinter as tk
from tkinter import ttk, messagebox
from scapy.all import *

# Global variables
window = tk.Tk()
window.title("Sniffing Detection")
window.geometry('800x600')

tree = ttk.Treeview(window)
tree["columns"] = ("timestamp", "source_mac", "source_ip", "protocol", "payload")
tree.column("#0", width=0, stretch=tk.NO)
tree.column("timestamp", anchor=tk.CENTER, width=150)
tree.column("source_mac", anchor=tk.CENTER, width=150)
tree.column("source_ip", anchor=tk.CENTER, width=150)
tree.column("protocol", anchor=tk.CENTER, width=150)
tree.column("payload", anchor=tk.CENTER, width=300)
tree.heading("timestamp", text="Timestamp")
tree.heading("source_mac", text="Source MAC")
tree.heading("source_ip", text="Source IP")
tree.heading("protocol", text="Protocol")
tree.heading("payload", text="Payload")
tree.pack(fill=tk.BOTH, expand=1)


def fetch_logs():
    conn = sqlite3.connect('log.db')
    c = conn.cursor()
    c.execute("SELECT * FROM log")
    logs = c.fetchall()
    for log in logs:
        tree.insert("", tk.END, text=log[0], values=log[1:])
    conn.close()


def sniff_packets():
    conn = sqlite3.connect('log.db')
    c = conn.cursor()
    try:
        sniff(filter="icmp or udp or arp", prn=lambda x: process_packet(x, c, conn), store=0)
    except Scapy_Exception as e:
        print(str(e))
    conn.close()


def process_packet(pkt, c, conn):
    try:
        if pkt.haslayer(ICMP):
            print("ICMP Packet Detected")
            messagebox.showwarning("Sniffing Alert", "ICMP Packet Detected!")
            
        elif pkt.haslayer(DNS):
            print("DNS Packet Detected")
            messagebox.showwarning("Sniffing Alert", "DNS Packet Detected!")

        elif pkt.haslayer(ARP):
            print("ARP Packet Detected")
            messagebox.showwarning("Sniffing Alert", "ARP Packet Detected!")
        elif pkt.haslayer(ICMP) and pkt[ICMP].type == 8:
            print("Ping Request Detected")
            messagebox.showwarning("Sniffing Alert", "Ping Request Detected!")

        timestamp = datetime.now()
        source_mac = pkt.src
        source_ip = pkt.getlayer(IP).src if pkt.haslayer(IP) else None
        protocol = pkt.summary()
        payload = str(pkt.payload)

        tree.insert("", tk.END, text=timestamp, values=(timestamp, source_mac, source_ip, protocol, payload))
        c.execute("INSERT INTO log (timestamp, source_mac, source_ip, protocol, payload) VALUES (?, ?, ?, ?, ?)", (timestamp, source_mac, source_ip, protocol, payload))
        conn.commit()

    except Exception as e:
        print(e)

t = threading.Thread(target=sniff_packets)
t.start()

window.mainloop()
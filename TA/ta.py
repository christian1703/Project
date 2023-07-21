import logging
logging.getLogger("scapy").setLevel(logging.ERROR)
import socket
from scapy.all import Ether, ARP, sendp

target_ip = "192.168.100.17"  # Ganti dengan IP target yang ingin Anda periksa

def send_arp_packet(target_ip, iface):
    fake_mac = "01:02:03:04:ab:cd"
    arp_packet = Ether(src=fake_mac) / ARP(hwsrc=fake_mac, pdst=target_ip)
    sendp(arp_packet, iface=iface, verbose=False)

def check_port(ip, port):
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.settimeout(1)  # Batas waktu koneksi
    result = sock.connect_ex((ip, port))
    sock.close()
    if result == 0:
        return "ARP REPLY dari : " + target_ip
    else:
        return "ARP REQUEST" 

wireshark_port = 5443  # Port yang digunakan oleh Wireshark
iface = "Wi-Fi"  # Nama antarmuka jaringan

send_arp_packet(target_ip, iface)
sniffing_result = check_port(target_ip, wireshark_port)

if sniffing_result:
    print(sniffing_result)
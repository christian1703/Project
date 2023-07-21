import logging
logging.getLogger("scapy").setLevel(logging.ERROR)
import socket
from scapy.all import Ether, ARP, sendp, srp, TCP

target_ip = "10.16.73.62"  # Ganti dengan IP target yang ingin Anda periksa

def send_arp_packet(target_ip, iface):
    fake_mac = "01:02:03:04:ab:cd"  # Ganti dengan MAC alamat yang valid dan berbeda
    arp_packet = Ether(dst="ff:ff:ff:ff:ff:ff") / ARP(hwsrc=fake_mac, pdst=target_ip)
    sendp(arp_packet, iface=iface, verbose=False)

def check_sniffing(target_ip):
    packet = Ether(dst="ff:ff:ff:ff:ff:ff") / ARP(pdst=target_ip)
    result = srp(packet, timeout=1, verbose=False)[0]
    for _, received_packet in result:
        if ARP in received_packet and received_packet[ARP].op in (1, 2):  # Request atau Reply
            return "ARP REPLY DARI : "+ target_ip
    return "ARP REQUEST"

iface = "Wi-Fi"  # Nama antarmuka jaringan

send_arp_packet(target_ip, iface)
sniffing_result = check_sniffing(target_ip)

print(sniffing_result)
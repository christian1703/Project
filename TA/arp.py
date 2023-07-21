from scapy.all import Ether, ARP, sendp, srp

target_ip = "10.110.0.2"
iface = "Wi-Fi"  # Nama antarmuka jaringan

# Membuat ARP NonBroadcast yang akan di kirimkan ke target IP dengan antarmuka jaringan
def arp_packet(target_ip, iface):
    fake_mac = "01:02:03:04:ab:cd"  # ARP NonBroadcast
    arp_packet = Ether(dst="ff:ff:ff:ff:ff:ff") / ARP(hwsrc=fake_mac, pdst=target_ip)
    sendp(arp_packet, target_ip, iface, verbose=False)

# Membuat fungsi yang akan mendeteksi apakah paket itu diterima atau tidak
def check_sniffing(target_ip):
    packet = Ether(dst="ff:ff:ff:ff:ff:ff") / ARP(pdst=target_ip)
    result = srp(packet, timeout=1, verbose=False)[0]
    for _, received_packet in result:
        if ARP in received_packet and received_packet[ARP].op in (1, 2): 
            return "ARP REPLY DARI : "+ target_ip
    return "ARP REQUEST"

# Kode ini berfungsi untuk memanggil output dari hasil deteksi sniffing
sniffing_result = check_sniffing(target_ip)
print(sniffing_result)
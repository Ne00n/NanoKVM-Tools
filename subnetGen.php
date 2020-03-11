<?php
//Generator for /etc/network/interfaces
//Forwards SSH + Ports & Blocks email

$count = 13;
$vmCount = 0;
$interface = 'eno1';

for ($i = 1; ; $i++) {
  if ($i == 1) {
    echo '
  #Add Mail block
  post-up iptables -A OUTPUT -p tcp --destination-port 25 -m iprange --src-range 10.0.6.1-10.0.6.254 -j DROP
  post-up iptables -A OUTPUT -p tcp --destination-port 110 -m iprange --src-range 10.0.6.1-10.0.6.254 -j DROP
  post-up iptables -A OUTPUT -p tcp --destination-port 465 -m iprange --src-range 10.0.6.1-10.0.6.254 -j DROP
  post-up iptables -A OUTPUT -p tcp --destination-port 587 -m iprange --src-range 10.0.6.1-10.0.6.254 -j DROP
  post-up iptables -A OUTPUT -p tcp --destination-port 995 -m iprange --src-range 10.0.6.1-10.0.6.254 -j DROP
    ';
  }
  echo '
  auto vmbr'.$i.'v4
  iface vmbr'.$i.'v4 inet static
  	address  10.0.6.'.$count.'
  	netmask  255.255.255.252
  	bridge-ports none'; $vmCount = $count +1; echo '
  	bridge-stp off
  	bridge-fd 0';
    if ($i == 1) {
      echo "
        post-up echo 1 > /proc/sys/net/ipv4/ip_forward
        post-up iptables -t nat -A POSTROUTING -s '10.0.6.0/24' -o ".$interface." -j MASQUERADE
        post-down iptables -t nat -D POSTROUTING -s '10.0.6.0/24' -o ".$interface." -j MASQUERADE";
    }
    echo '
  	post-up iptables -t nat -A PREROUTING -i '.$interface.' -p tcp --dport '.$vmCount.'00 -j DNAT --to 10.0.6.'.$vmCount.':22
  	post-up iptables -t nat -A PREROUTING -i '.$interface.' -p tcp --dport '.$vmCount.'01:'.$vmCount.'20 -j DNAT --to 10.0.6.'.$vmCount.'
  	post-up iptables -t nat -A PREROUTING -i '.$interface.' -p udp --dport '.$vmCount.'01:'.$vmCount.'20 -j DNAT --to 10.0.6.'.$vmCount.'';
    echo "\n\r";
    if ($i > 24) { break;}
   $count = $count +4;
}

?>

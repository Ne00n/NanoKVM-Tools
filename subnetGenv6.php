<?php
//Generator for /etc/network/interfaces
//Deploys IPv6 /80 Static when only a /64 is available + Blocks email
//Tools used to Generate the /80 => https://subnettingpractice.com/ipv6_subnetting.html used fd6a:81db:899f:f1ea::/64

$v6 = 'fd6a:81db:899f:f1ea::/80
fd6a:81db:899f:f1ea:1::/80
fd6a:81db:899f:f1ea:2::/80
fd6a:81db:899f:f1ea:3::/80
fd6a:81db:899f:f1ea:4::/80
fd6a:81db:899f:f1ea:5::/80
fd6a:81db:899f:f1ea:6::/80
fd6a:81db:899f:f1ea:7::/80
fd6a:81db:899f:f1ea:8::/80
fd6a:81db:899f:f1ea:9::/80
fd6a:81db:899f:f1ea:a::/80
fd6a:81db:899f:f1ea:b::/80
fd6a:81db:899f:f1ea:c::/80
fd6a:81db:899f:f1ea:d::/80
fd6a:81db:899f:f1ea:e::/80
fd6a:81db:899f:f1ea:f::/80
fd6a:81db:899f:f1ea:10::/80
fd6a:81db:899f:f1ea:11::/80
fd6a:81db:899f:f1ea:12::/80
fd6a:81db:899f:f1ea:13::/80
fd6a:81db:899f:f1ea:14::/80
fd6a:81db:899f:f1ea:15::/80
fd6a:81db:899f:f1ea:16::/80
fd6a:81db:899f:f1ea:17::/80
fd6a:81db:899f:f1ea:18::/80
fd6a:81db:899f:f1ea:19::/80
fd6a:81db:899f:f1ea:1a::/80';

$v6 = str_replace("/80", "", $v6);
$v6s = preg_split("/\r\n|\n|\r/", $v6);

for ($i = 1; ; $i++) {
  echo '
  auto vmbr'.$i.'v6
    iface vmbr'.$i.'v6 inet6 static
    	address  '.$v6s[$i -1].'1
    	netmask  80
    	bridge-ports none
    	bridge-stp off
    	bridge-fd 0
    	post-up ip6tables -A OUTPUT -p tcp --destination-port 25 -s '.$v6s[$i -1].'1 -j DROP
    	post-up ip6tables -A OUTPUT -p tcp --destination-port 110 -s '.$v6s[$i -1].'1 -j DROP
    	post-up ip6tables -A OUTPUT -p tcp --destination-port 465 -s '.$v6s[$i -1].'1 -j DROP
    	post-up ip6tables -A OUTPUT -p tcp --destination-port 587 -s '.$v6s[$i -1].'1 -j DROP
    	post-up ip6tables -A OUTPUT -p tcp --destination-port 995 -s '.$v6s[$i -1].'1 -j DROP';
      echo "\n\r";
  if ($i > 26) { break;}
}



?>

<?php
//Generator for /etc/radvd.conf
//Deploys /64 IPv6 Subnet per Bridge when a /56 or larger is available


$v6 = 'fd6a:81db:899f:f1ea::/64
fd6a:81db:899f:f1ea:1::/64
fd6a:81db:899f:f1ea:2::/64
fd6a:81db:899f:f1ea:3::/64
fd6a:81db:899f:f1ea:4::/64
fd6a:81db:899f:f1ea:5::/64
fd6a:81db:899f:f1ea:6::/64
fd6a:81db:899f:f1ea:7::/64
fd6a:81db:899f:f1ea:8::/64
fd6a:81db:899f:f1ea:9::/64
fd6a:81db:899f:f1ea:a::/64
fd6a:81db:899f:f1ea:b::/64
fd6a:81db:899f:f1ea:c::/64
fd6a:81db:899f:f1ea:d::/64
fd6a:81db:899f:f1ea:e::/64
fd6a:81db:899f:f1ea:f::/64
fd6a:81db:899f:f1ea:10::/64
fd6a:81db:899f:f1ea:11::/64
fd6a:81db:899f:f1ea:12::/64
fd6a:81db:899f:f1ea:13::/64
fd6a:81db:899f:f1ea:14::/64
fd6a:81db:899f:f1ea:15::/64
fd6a:81db:899f:f1ea:16::/64
fd6a:81db:899f:f1ea:17::/64
fd6a:81db:899f:f1ea:18::/64
fd6a:81db:899f:f1ea:19::/64
fd6a:81db:899f:f1ea:1a::/64';

$v6 = str_replace("/64", "", $v6);
$v6s = preg_split("/\r\n|\n|\r/", $v6);

for ($i = 1; ; $i++) {
  echo '
  #vmbr'.$i.'v6
  interface vmbr'.$i.'v6
  {
         AdvSendAdvert on;
         prefix  '.$v6s[$i -1].'/64
         {
                 AdvOnLink on;
                 AdvAutonomous on;
                 AdvRouterAddr on;
         };
  };';
  echo "\n\r";
  if ($i > 24) { break;}
}

?>

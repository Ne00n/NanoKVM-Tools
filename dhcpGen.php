<?php
//Generator for isc-dhcp-server
//File /etc/dhcp/dhcpd.conf

$subnet = 8;
$router = 9;
$vm = 10;

$mac = array('fb:e6:8e:8d:e5:94',
'ea:e9:66:05:43:a6',
'2d:9a:f5:df:f0:4b',
'6f:0b:99:b9:88:ce',
'66:21:26:73:6f:a5',
'b8:c5:7c:3e:a0:93',
'eb:d8:17:64:19:b8',
'5f:7d:19:07:1c:07',
'0d:bb:f0:73:2d:6c',
'c1:26:58:aa:93:c9',
'e4:c2:3c:1d:cb:7d',
'23:ca:95:54:38:85',
'b0:e1:3d:e5:72:9d',
'42:a2:92:3e:d6:cc',
'27:99:55:18:93:29',
'f2:e7:52:83:00:ba',
'b8:28:ed:1b:8b:0d',
'43:e4:3a:27:33:e7',
'a2:82:24:a5:6d:19',
'86:29:81:29:73:77',
'66:62:2c:0e:46:c6',
'f3:ba:1d:77:2c:1d',
'42:f2:95:19:71:c6',
'16:2c:08:77:92:2c',
'0e:e7:d5:18:2b:f8');

for ($i = 1; ; $i++) {
  $subnet = $subnet + 4;
  $router = $subnet +1;
  $vm = $subnet +2;
  echo '

  subnet 10.0.6.'.$subnet.' netmask 255.255.255.252 {
          default-lease-time 600;
          max-lease-time 7200;
          deny unknown-clients;
          authoritive;
          option domain-name-servers 8.8.8.8, 1.1.1.1;
          range 10.0.6.'.$vm.' 10.0.6.'.$vm.';
          option routers 10.0.6.'.$router.';
  }

  host vm'.$i.' {
    hardware ethernet '.$mac[$i -1].';
    fixed-address 10.0.6.'.$vm.';
  }';
  if ($i > 24) { break;}
}



?>

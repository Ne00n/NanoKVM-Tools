# NanoKVM-Tools for Proxmox 4/5/6

DHCPv4: dhcpGen.php & iscGen.php<br>
Networkv4: subnetGen.php<br>
Networkv6: subnetGenv6.php<br>
IPv6 via radvd: radvdGen.php<br>

## Usage
If you got a /56 or larger you should assign a /64 per VM so go with radvdGen.php<br>
You will also need to deploy ndppd.

If you got a /64 or less, you need to configure it static, skip radvdGen.php and just use subnetGenv6.php

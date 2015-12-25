VPS samaurai-boxing-gym
======
VPS Information:
-       IP: 103.54.250.108
-       Port ssh: 22
-       Login Name: root
-       Password: moBs8kB@1


Control panel information:
-       Link: http://103.54.250.108:2222
-       User: admin
-       Password: TUViSEkV


Mysql:
-       Link: http://103.54.250.108/phpmyadmin
-       User: da_admin
-       Password: TUViSEkV


Auto login ssh:


-       cat ~/.ssh/id_rsa.pub | ssh root@103.54.250.108 'cat >> .ssh/authorized_keys'
-       cat ~/.ssh/id_rsa.pub | ssh -i /Users/propolife/fdk/deployment/fdk-production.pem ec2-user@52.69.0.54 'cat >> .ssh/authorized_keys'


Controlpanel URL:
-       http://access.pavietnam.vn
-       Domain: samurai-boxing-gym.vn
-       Password: zeqj2136qskb




ELT VIETNAM
======

Hosting:
-       https://118.69.204.220:2222
-       User: eltvncom
-       Pass: Eltvn01


Mysql:
-       phpMyAdmin: eltvncom_elt 04ZCyl!$



www.starmica-r.co.jp
======

Hosting:
  ssh -p 32768 fudosanking@103.9.92.69
  PASS: 7ehCsCOj
  sudo su

  103.9.92.69
  ID: starmica-r
  PW: mica2015

  scp -P 32768 -r fudosanking@103.9.92.69:/var/www/starmica-r.co.jp /home/ec2-user
  scp -r webapp1.intra.fudosan-king.jp:/home/ec2-user/starmica-r.co.jp ~/Desktop

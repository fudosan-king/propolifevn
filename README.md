VPS Propolife VietNam
======
VPS Information:
-       IP: 43.239.148.40
-       Port ssh: 22
-       Login Name: root
-       Password: M39gRauG@1

-       Login Name: propolife
-       Password: T8p7xDWh@1


Mysql:
-       http://43.239.148.40/mysql/
-       User: root
-       Password: 5fZ7mcBSZ2L:s![p


Auto login ssh:


-       cat ~/.ssh/id_rsa.pub | ssh root@43.239.148.40 'cat >> .ssh/authorized_keys'
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

SSH:
-       ssh -p 32768 fudosanking@103.9.92.69
-       PASS: 7ehCsCOj
-       sudo su


Hosting:
-       103.9.92.69
-       ID: starmica-r
-       PW: mica2015


Copy:
-       scp -P 32768 -r fudosanking@103.9.92.69:/var/www/starmica-r.co.jp /home/ec2-user
-       scp -r webapp1.intra.fudosan-king.jp:/home/ec2-user/starmica-r.co.jp ~/Desktop

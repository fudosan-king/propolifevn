#!/bin/sh
rsync --delete -e 'ssh -i root@222.255.217.23' -rlpcgz -v --exclude-from=excludes ./cg_propolife/ root@222.255.217.23:/var/www/html/cgpropolife/wp-content/themes/cg_propolife
#!/bin/sh
rsync --delete -e 'ssh -i root@222.255.117.23' -rlpcgz -v --exclude-from=excludes ./hairsalon root@222.255.117.23:/var/www/html
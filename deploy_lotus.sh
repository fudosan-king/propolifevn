#!/bin/sh
rsync --delete -e 'ssh -i root@43.239.148.40' -rlpcgz -v --exclude-from=excludes ./lotus root@43.239.148.40:/var/www/html
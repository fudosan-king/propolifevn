#!/bin/sh
rsync --delete -e 'ssh -i root@103.54.250.108' -rlpcgz -v --exclude-from=excludes ./ems root@103.54.250.108:/var/www/html
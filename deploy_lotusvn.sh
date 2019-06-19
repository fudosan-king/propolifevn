#!/bin/sh
rsync --delete -e 'ssh -i root@222.255.217.23' -rlpcgz -v --exclude-from=excludes ./lotusvn/ root@222.255.217.23:/var/www/html/lotusvn/wp-content/themes/lotusvn/

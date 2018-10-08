#!/bin/sh
rsync --delete -e 'ssh -i root@222.255.217.23' -rlpcgz -v --exclude-from=excludes ./propolife/wp-content/ root@222.255.217.23:/var/www/html/propolife/wp-content
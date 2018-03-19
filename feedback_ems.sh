#!/bin/sh
rsync -e 'ssh -i root@222.255.217.23' -rlpcDvz --exclude-from=excludes root@222.255.217.23:/var/www/html/ems ./

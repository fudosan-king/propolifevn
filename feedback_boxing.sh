#!/bin/sh
rsync -e 'ssh -i root@43.239.148.40' -rlpcDvz --exclude-from=excludes root@43.239.148.40:/var/www/html/boxing ./

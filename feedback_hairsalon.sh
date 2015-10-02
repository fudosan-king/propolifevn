#!/bin/sh
rsync -e 'ssh -i root@103.54.250.108' -rlpcDvz --exclude-from=excludes root@103.54.250.108:/var/www/html/hairsalon ./

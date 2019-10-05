#!/bin/sh
rsync -e 'ssh -i root@222.255.117.23' -rlpcDvz root@222.255.117.23:/var/www/html/propolife/wp-content/ ./propolife/wp-content/

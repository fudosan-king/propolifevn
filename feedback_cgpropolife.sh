#!/bin/sh
rsync -e 'ssh -i root@222.255.217.23' -rlpcDvz root@222.255.217.23:/var/www/html/cgpropolife/wp-content/themes/cg_propolife ./

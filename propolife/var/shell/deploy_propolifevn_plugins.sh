#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes_wp ./wp-content/plugins/ php.propolifevietnam.com:/var/www/html/propolife/wp-content/plugins/

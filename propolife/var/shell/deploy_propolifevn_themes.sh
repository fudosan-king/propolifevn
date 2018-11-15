#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes_wp ./wp-content/themes/  php.propolifevietnam.com:/var/www/html/propolife/wp-content/themes/

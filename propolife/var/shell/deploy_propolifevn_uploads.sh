#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes_wp ./wp-content/uploads/  php.propolifevietnam.com:/var/www/html/propolife/wp-content/uploads/

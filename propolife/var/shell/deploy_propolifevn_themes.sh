#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes_wp ./wp-content/themes/  php.propolifevietnam.com:/var/propolifevn/html/propolife/wp-content/themes/

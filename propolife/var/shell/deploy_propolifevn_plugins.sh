#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes_wp ./wp-content/plugins/ php.propolifevietnam.com:/var/propolifevn/html/propolife/wp-content/plugins/

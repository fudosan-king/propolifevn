#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=excludes ./chroniclevn/ php.propolifevietnam.com:/var/www/html/chroniclevn/wp-content/themes/chroniclevn/

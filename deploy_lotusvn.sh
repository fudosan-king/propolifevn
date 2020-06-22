#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=excludes ./lotusvn/ php.propolifevietnam.com:/var/www/html/lotusvn/wp-content/themes/lotusvn/

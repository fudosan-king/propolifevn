#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes  php.propolifevietnam.com:/var/www/html/lotusvn/wp-content/themes/lotusvn/  ./lotusvn/ 
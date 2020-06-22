#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes  php.propolifevietnam.com:/var/www/html/chroniclevn/wp-content/themes/chroniclevn/  ./chroniclevn/
#!/bin/sh
rsync -rlpcDvz --exclude-from=var/shell/excludes_wp  php.propolifevietnam.com:/var/www/html/propolife/wp-content/uploads/ ./wp-content/uploads/
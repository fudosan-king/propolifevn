#!/bin/sh
rsync -rlpcDvz --exclude-from=var/shell/excludes_wp  php.propolifevietnam.com:/var/propolifevn/html/kyowakiden/wp-content/uploads/ ./wp-content/uploads/
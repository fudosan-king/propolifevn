#!/bin/sh
rsync --delete -rlpcgz -v --exclude-from=var/shell/excludes ./ php.propolifevietnam.com:/var/propolifevn/html/kyowakiden
#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/aodai/production/ ./source/aodai/
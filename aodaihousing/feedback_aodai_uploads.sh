#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/aodai/production/static/uploads/ ./source/aodai/static/uploads/
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/aodai/production/ja/static/uploads/ ./source/aodai/ja/static/uploads/
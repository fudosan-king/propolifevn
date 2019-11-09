#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/aodai/production/static/uploads/ ./sources/aodai/static/uploads/
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/aodai/production/ja/static/uploads/ ./sources/aodai/ja/static/uploads/
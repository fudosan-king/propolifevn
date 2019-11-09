#!/bin/sh
rsync -rlpcDvz --exclude-from=excludes aodaihousing.com:/var/www/html/office-vn/production/static/uploads/ ./sources/office-vn/static/uploads/
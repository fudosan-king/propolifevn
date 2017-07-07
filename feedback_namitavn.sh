#!/bin/sh
rsync -e 'ssh -i namitavn.key -p10022 kir824922@133.18.34.114' -rlpcDvz --exclude-from=excludes kir824922@133.18.34.114:/home/kir824922/public_html/namitavn ./

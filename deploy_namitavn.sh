
rsync --delete -e 'ssh -i namitavn.key -p10022' -rlpcgz -v --exclude-from=excludes ./namitavn kir824922@133.18.34.114:/home/kir824922/public_html/

#!/bin/bash

find /var/lib/mysql -type f -exec touch {} \; && service mysql start
/etc/init.d/apache2 start
cron
echo "* * * * * /bin/sh -c 'rm -rf /var/www/html/upload/*'" | crontab
/bin/bash
tail -f /dev/null

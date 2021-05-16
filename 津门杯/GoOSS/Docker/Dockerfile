FROM php:7.0-apache


# COPY ./sources.list /etc/apt/sources.list
# RUN \
#         apt-get update && \
#         apt-get install -y php-fpm && \
#         apt-get install -y nginx && \
#         apt-get install -y vim && \
#         apt-get install -y curl

# COPY ./default /etc/nginx/sites-available/default
# COPY ./nginx.conf /etc/nginx/nginx.conf

# 添加启动脚本
COPY ./app/index.php /var/www/html/index.php
COPY ./app/flag /flag
COPY ./app/main /opt/main
COPY ./app/start.sh /start.sh

RUN chmod 755 /flag
RUN mkdir /var/www/html/files
CMD ["bash","/start.sh"]

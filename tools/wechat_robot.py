#!/usr/bin/python3
import requests
import json

#url = "http://daresay.gz01.bdysite.com/internal_0506/server/server.php?action=hss_find_src&grade=primary&subject=grammer"
server_url = "http://daresay.gz01.bdysite.com/internal_0506/server/server.php?action=who_need_pay"
cnt = requests.get(server_url).text

url = "https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=1b1da5c1-06cc-49e7-b6ef-81a0d8a9a093"
headers = {"Content-Type": "text/plain"}
print(cnt)
cnt = json.loads(cnt)
for val in cnt:
    print(val)
    data = {"msgtype": "text","text":{"content":"Class: {} Name: {}".format(val, cnt[val])}}
    r = requests.post(url,headers=headers, json=data)
print(r)


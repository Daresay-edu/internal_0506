#!/usr/bin/python3
# -*- coding: utf-8 -*-
import requests
import json
import time 
admin_robot_url = "https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=1b1da5c1-06cc-49e7-b6ef-81a0d8a9a093"
teacher_robot_url = "https://qyapi.weixin.qq.com/cgi-bin/webhook/send?key=1b1da5c1-06cc-49e7-b6ef-81a0d8a9a093"
server_base_url = "http://daresay.gz01.bdysite.com/internal_0506/server/server.php"
headers = {"Content-Type": "text/plain"}

def echo_title(url, title):
    data = {
               "msgtype" : "markdown",
               "markdown" : {
                          "content" : title 
               }
           }
    r = requests.post(admin_robot_url,headers=headers, json=data)
    
def who_need_pay():
    # send who need to pay
    who_need_pay_url = server_base_url + "?action=who_need_pay"
    cnt = requests.get(who_need_pay_url).text
    # current hour
    
    echo_title(admin_robot_url, "<font color='warning'>下列学生需要交下一期的学费啦</font>")
    cnt = json.loads(cnt)
    content=""
    for val in cnt:
        cur_hour = eval(requests.get(server_base_url + "?action=class_current_hour&classid=" + val).text)
        content = content + ">**班级:** {}\n **班级课时**：{}\n".format(val, cur_hour)
        stu_str = ""
        for stu in cnt[val]:
            stu_str = stu_str +"  " +stu
        content = content + "**需缴费学生**：{}\n\n\n".format(stu_str)
    
    data = {
               "msgtype" : "markdown",
               "markdown" : {
                          "content" : content
               }
           }
    r = requests.post(admin_robot_url,headers=headers, json=data)
    print(data)

def who_need_makeup():
    echo_title(teacher_robot_url, "<font color='warning'>下列学生需要在本周去对应的班级</font><font color='info'>**补课**</font>")
    who_need_pay_url = server_base_url + "?action=who_need_makeup_this_week"
    cnt = requests.get(who_need_pay_url).text

    cnt = json.loads(cnt)
    content=""
    num = 1
    for classid in cnt:
        for makeup in cnt[classid]:
            content = "**补课通知 {}**\n >**缺课学生:** {}, {}\n **缺课课时:** {}\n **前往补课班级:** {}\n**补课时间:** {}\n\n\n".format(num, makeup['classid'], makeup['engname'], makeup['makeup_hour'], makeup['target_class'], makeup['makeup_date'])
    
            data = {
                       "msgtype" : "markdown",
                       "markdown" : {
                                  "content" : content,
                                  "mentioned_list" : ["@all"]
                       }
                   }
            r = requests.post(admin_robot_url,headers=headers, json=data)
            time.sleep(4)
            print(data)
            num = num + 1

if __name__=="__main__":
    who_need_pay()  
    who_need_makeup()

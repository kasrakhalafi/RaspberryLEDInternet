import requests
import time
import re
import json
import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setup(12,GPIO.OUT)

while True:
    URL = "http://qeshmvoltageiot.com/index.php?data=DATA"
    #adad = '5'
    #PARAMS = {'ourVoltage': adad}
    r = requests.get(URL, params="")
    #print(r.text)
    #DATAA = {'number': 12524, 'type': 'issue', 'action': 'show'}
    #rmm = requests.post("http://qeshmvoltageiot.com/index.php", data=json.dumps(DATAA))
    #print(rmm.status_code, rmm.reason)

    matchObj = re.search("THISISOURS: ([0-9])", r.content.decode())
    if matchObj:
	    if matchObj.group(1)=='1':
		    print("ONNNN")
		    GPIO.output(12,GPIO.HIGH)
	    elif matchObj.group(1)=='0':
		    print("offf")
		    GPIO.output(12,GPIO.LOW)
        elif matchObj.group(1)=='1':
		    print("Blinking")
		    GPIO.output(12,GPIO.HIGH)
            time.sleep(0.2)
            GPIO.output(12,GPIO.LOW)
        else:
            pass

    time.sleep(0.2)

"""
import requests

url = "http://qeshmvoltageiot.com/index.php"

payload = {'firstname': 'Kasra', 'lastname': 'Khalafi', 'password': '123456'}
while True:
    r = requests.post(url, data=payload)
"""

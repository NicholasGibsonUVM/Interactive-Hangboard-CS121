#!/usr/bin/python3

import time
import cgi
import sys
import mariadb

EMULATE_HX711=False

if not EMULATE_HX711:
    import RPi.GPIO as GPIO
    from hx711 import HX711
else:
    from emulated_hx711 import HX711

def cleanAndExit():
    print("Cleaning...")

    if not EMULATE_HX711:
        GPIO.cleanup()
        
    print("Bye!")
    sys.exit()


referenceUnit = 8

hx = HX711(5, 6)

hx.set_reading_format("MSB", "MSB")

hx.set_reference_unit(referenceUnit)

hx.reset()

hx.tare()

# Copy
PIN_RED = 3
PIN_GREEN = 2
PIN_YELLOW = 4

GPIO.setup(PIN_RED, GPIO.OUT)
GPIO.setup(PIN_GREEN, GPIO.OUT)
GPIO.setup(PIN_YELLOW, GPIO.OUT)

def ledOn(pin):
    GPIO.output(pin, GPIO.HIGH)

def ledOff(pin):
    GPIO.output(pin, GPIO.LOW)
#Copy

ledOff(PIN_RED)
ledOff(PIN_YELLOW)
ledOff(PIN_GREEN)

def getWeight():
    try:
        val = hx.get_weight(5)
        hx.power_down()
        hx.power_up()
        return val
    except (KeyboardInterrupt, SystemExit):
        cleanAndExit()

def store_data(sessionId, hangTime, hold):
    database = mariadb.connect(user="root", passwd="NAG_champa12", host="localhost", database="hangboard")

    cursor = database.cursor()

    hold = int(hold)

    sessionId = int(sessionId)

    insert_sql = "INSERT INTO `tblHang` (`fpkSessionId`, `fldHold`, `fldTime`) VALUES (%d,%d,%f)" % (sessionId, hold, hangTime)
    cursor.execute(insert_sql)

    database.commit()

    cursor.close()
    database.close()

def hang(holdId):
    holdId = int(holdId)
    test = True
    for i in range(1,5):
        std = getWeight() + 3000
        time.sleep(.1)
    if (holdId == 1):
        ledOn(PIN_YELLOW)
    elif (holdId == 2):
        ledOn(PIN_GREEN)
    elif (holdId == 3):
        ledOn(PIN_RED)
    while test:
        val = getWeight()
        if (val > std):
            start = time.time()
            time.sleep(.1)
            while (val > std):
                val = getWeight()
                time.sleep(.1)
            end = time.time()
            hangTime = end - start
            test = False
        time.sleep(.1)
    return hangTime

print("Content-Type: text/html")
print("\n")
print("\n")
print("""
<html>
    <head>
        <title>Start Session</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container p-5 my-5 border bg-dark text-white">
            <h1>Start Session</h1>
            <p>Enter Which Hold</p>
            <div class="row">
                <form method="post">
                    <button class="col m-1 btn btn-outline-primary" name="hold" value="1">Hold 1</button>
                    <button class="col m-1 btn btn-outline-primary" name="hold" value="2">Hold 2</button>
                    <button class="col m-1 btn btn-outline-primary" name="hold" value="3">Hold 3</button>
                </form>
            </div>
            <div>
                <a href="http://169.254.74.233/templates/profile.php">Finish Session</a>
            </div>
        </div>
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
""")
form = cgi.FieldStorage()
sesid = form['sesid'].value
if "hold" in form:
    hold = form['hold'].value
    store_data(sesid, hang(hold), hold)
    #copy
    if (int(hold) == 1):
        ledOff(PIN_YELLOW)
    elif (int(hold) == 2):
        ledOff(PIN_GREEN)
    elif (int(hold) == 3):
        ledOff(PIN_RED)
    #copy
    print("<p>Data Stored</p>")
print("</body></html>")

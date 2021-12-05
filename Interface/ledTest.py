import RPi.GPIO as GPIO
import time

def ledBlink(pin, timeSleep):
    GPIO.output(pin, GPIO.HIGH)
    time.sleep(timeSleep)
    GPIO.output(pin, GPIO.LOW)

PIN_RED = 3
PIN_GREEN = 2
PIN_YELLOW = 4

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(PIN_RED, GPIO.OUT)
GPIO.setup(PIN_GREEN, GPIO.OUT)
GPIO.setup(PIN_YELLOW, GPIO.OUT)

for i in range(0, 20):
    ledBlink(PIN_RED, 1)
    ledBlink(PIN_YELLOW, 1)
    ledBlink(PIN_GREEN, 1)
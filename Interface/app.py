from flask import *
import json

app = Flask(__name__)

@app.route('/', methods=['GET'])
def frontPage():
    return render_template("index.php")

@app.route('/login', methods=['GET'])
def login():
    return render_template("login.php")
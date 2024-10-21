from flask import Flask
import sys
sys.path.insert(0, '/var/customers/webs/gfn/lf05/scripts')

# Importiere das Skript
from hello_world import hello_world

app = Flask(__name__)

@app.route('/')
def home():
    return "Hallo, willkommen bei meiner Flask-App!"

# Neue Route für das hello-world.py-Skript
@app.route('/hello')
def run_hello_world():
    # Aufruf der Funktion aus dem Skript
    return hello_world()

if __name__ == '__main__':
    app.run()
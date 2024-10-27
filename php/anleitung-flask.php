<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = 'Eine Kurzanleitung für Flask';
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.core.header.inc.php");
?>

<h3 class="boxTitle">Flask und alle nötigen Pakete herunterladen und starten</h3>
<pre><code class="language-bash">sudo apt install python3 python3-pip python3-venv libapache2-mod-wsgi-py3</code></pre>
<p class="notice">Dies gilt für Ubuntu. Die Wahrscheinlichkeit, dass Debian mehr Pakete benötigt, ist gegeben</p>
<pre><code class="language-bash">cd <span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-flask-ausgeführt werden soll/</span>
python3 -m venv venv
source venv/bin/activate
pip install Flask
pip install mysql-connector-python
pip install flask-restful
deactivate</code></pre>

<h3 class="boxTitle">FlaskApp konfigurieren</h3>
<p style="font-weight: bold; color:darkred;">nano flaskapp.wsgi</p>
<pre><code class="language-python">import sys

sys.path.insert(0, '<span style="font-weight: bold; color:darkred;">/verzeichnis-in-dem-flask-ausgeführt werden soll/</span>')
from app import app as application</code></pre>

<h3 class="boxTitle">App anlegen</h3>
<p style="font-weight: bold; color:darkred;">nano app.py</p>
<pre><code class="language-python">from flask import Flask
app = Flask(__name__)

@app.route('/')
def hello():
    return "Hallo Welt!"

if __name__ == '__main__':
    app.run(debug=True)</code></pre>

<h3 class="boxTitle">Apache-Konfiguration <span style="color:darkred;">anpassen</span></h3>
<pre><code class="apache">WSGIDaemonProcess flaskapp python-path=/verzeichnis-mit-dem-flask-verzeichnis/:/verzeichnis-mit-dem-flask-verzeichnis/venv/lib/python3.XX/site-packages
WSGIProcessGroup flaskapp
WSGIScriptAlias / /verzeichnis-in-dem-flask-ausgeführt werden soll/flaskapp.wsgi</code></pre>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
    ?>
import sys
import flask
import mysql.connector
import random
import string

from flask import Flask, redirect, render_template, request
from mysql.connector import Error
from config import Config

app = Flask(__name__)
app.config.from_object(Config)

@app.context_processor
def inject_versions():
    return dict(
        python_version=get_python_version(),
        flask_version=get_flask_version()
    )

def get_python_version():
    version_info = sys.version_info
    return f"{version_info.major}.{version_info.minor}.{version_info.micro}"

def get_flask_version():
    return flask.__version__

def get_db_connection():
    try:
        connection = mysql.connector.connect(
            host=app.config['MYSQL_HOST'],
            user=app.config['MYSQL_USER'],
            password=app.config['MYSQL_PASSWORD'],
            database=app.config['MYSQL_DB']
        )
        if connection.is_connected():
            return connection
    except Error as e:
        print(f"Fehler bei der Verbindung zur Datenbank: {e}")
        return None

@app.route('/')
def hallo():
    return render_template('index.html', bereich='Python-Bereich', pageTitle='Startseite der Python-Instanz')

@app.route('/database-test/')
def test():
    connection = get_db_connection()
    if connection:
        cursor = connection.cursor()
        cursor.execute("SELECT 1")
        result = cursor.fetchone()
        cursor.close()
        connection.close()
        return render_template('database-test.html', bereich='Python-Bereich', pageTitle='Datenbanktest mit Python')
    else:
        return "Es gibt ein Problem bei der Datenbankverbindung. Die Seite wird aus Sicherheitsgründen nicht geladen.", 500

def generiere_passwort(laenge):
    if laenge < 1 or laenge > 81:
        return None
    zeichen = string.ascii_letters + string.digits + string.punctuation
    return ''.join(random.choice(zeichen) for _ in range(laenge))

@app.route('/passwortgenerator/', methods=['GET', 'POST'])
def passwortgenerator():
    passwort = None
    error = None
    if request.method == 'POST':
        eingabe = request.form.get('laenge', type=int)
        if eingabe is not None:
            passwort = generiere_passwort(eingabe)
            if not passwort:
                error = "Die Zahl muss zwischen 1 und 81 liegen."
    return render_template('passwortgenerator.html', bereich='Python-Bereich', pageTitle='Passwortgenerator', passwort=passwort, error=error)

@app.route('/umsatzrechner/')
def umsatzrechner_2023():
    monate_zuweisung = {
        1: 'Januar',
        2: 'Februar',
        3: 'März',
        4: 'April',
        5: 'Mai',
        6: 'Juni',
        7: 'Juli',
        8: 'August',
        9: 'September',
        10: 'Oktober',
        11: 'November',
        12: 'Dezember'
    }
    connection = get_db_connection()
    if connection:
        cursor = connection.cursor()
        cursor.execute("SELECT monat, umsatz FROM umsatz_2023")
        umsatz_2023 = cursor.fetchall()
        cursor.close()
        connection.close()
        umsatz_2023 = [(monate_zuweisung[monat], umsatz) for monat, umsatz in umsatz_2023]
        return render_template('umsatzrechner.html', bereich='Python-Bereich', pageTitle='Umsatzrechner 2023', umsatz_2023=umsatz_2023)
    else:
        return "Es gibt ein Problem bei der Datenbankverbindung. Die Seite wird aus Sicherheitsgründen nicht geladen.", 500


if __name__ == '__main__':
    app.run(debug=True)


















################################################################ ZUKÜNFTIGE AUSLAGERUNG, SIEHE BLOG ################################################################################

@app.route('/acp/')
def hallo_acp():
    return render_template('acp_index.html', bereich='Administrationsbereich', pageTitle='Startseite der Administrationsoberfläche')

@app.route('/acp/umsatzrechner/2023/')
def acp_umsatzrechner_2023_index():
    monate_zuweisung = {
        1: 'Januar',
        2: 'Februar',
        3: 'März',
        4: 'April',
        5: 'Mai',
        6: 'Juni',
        7: 'Juli',
        8: 'August',
        9: 'September',
        10: 'Oktober',
        11: 'November',
        12: 'Dezember'
    }
    connection = get_db_connection()
    if connection:
        cursor = connection.cursor()
        cursor.execute("SELECT id, monat, umsatz FROM umsatz_2023")
        umsatz_2023_acp = cursor.fetchall()
        cursor.close()
        connection.close()
        umsatz_2023_acp = [(id, monate_zuweisung[monat], umsatz) for id, monat, umsatz in umsatz_2023_acp]
        return render_template('acp_umsatzrechner_2023_index.html', bereich='Administrationsbereich', pageTitle='Umsatzrechner 2023', umsatz_2023_acp=umsatz_2023_acp)
    else:
        return "Es gibt ein Problem bei der Datenbankverbindung. Die Seite wird aus Sicherheitsgründen nicht geladen.", 500

@app.route('/acp/umsatzrechner/2023/add/', methods=['GET', 'POST'])
def acp_umsatz_2023_add():
    monate_zuweisung = {
        1: 'Januar',
        2: 'Februar',
        3: 'März',
        4: 'April',
        5: 'Mai',
        6: 'Juni',
        7: 'Juli',
        8: 'August',
        9: 'September',
        10: 'Oktober',
        11: 'November',
        12: 'Dezember'
    }
    
    if request.method == 'POST':
        monat = request.form.get('monat', type=int)
        umsatz = request.form.get('umsatz', type=float)
        if monat in monate_zuweisung and umsatz is not None:
            connection = get_db_connection()
            if connection:
                try:
                    cursor = connection.cursor()
                    cursor.execute("INSERT INTO umsatz_2023 (monat, umsatz) VALUES (%s, %s)", (monat, umsatz))
                    connection.commit()
                    cursor.close()
                except Error as e:
                    print(f"Fehler beim Hinzufügen des Eintrags: {e}")
                    connection.rollback()
                finally:
                    connection.close()
                return redirect('/acp/umsatzrechner/2023/')
            else:
                return "Es gibt ein Problem bei der Datenbankverbindung. Die Seite wird aus Sicherheitsgründen nicht geladen.", 500
        else:
            return "Ungültige Eingaben. Bitte überprüfen Sie die Angaben.", 400
    else:
        return render_template('acp_umsatz_2023_add.html', monate=monate_zuweisung)

@app.route('/acp/umsatzrechner/2023/edit/<int:id>/', methods=['GET', 'POST'])
def acp_umsatz_2023_edit(id):
    monate_zuweisung = {
        1: 'Januar',
        2: 'Februar',
        3: 'März',
        4: 'April',
        5: 'Mai',
        6: 'Juni',
        7: 'Juli',
        8: 'August',
        9: 'September',
        10: 'Oktober',
        11: 'November',
        12: 'Dezember'
    }
    connection = get_db_connection()
    if connection:
        cursor = connection.cursor()
        if request.method == 'POST':
            new_umsatz = request.form.get('umsatz', type=float)
            cursor.execute("UPDATE umsatz_2023 SET umsatz = %s WHERE id = %s", (new_umsatz, id))
            connection.commit()
            cursor.close()
            connection.close()
            return redirect('/acp/umsatzrechner/2023/')
        else:
            cursor.execute("SELECT monat, umsatz FROM umsatz_2023 WHERE id = %s", (id,))
            umsatz_2023_acp = cursor.fetchone()
            cursor.close()
            connection.close()
            if umsatz_2023_acp:
                monat = monate_zuweisung[umsatz_2023_acp[0]]
                umsatz = umsatz_2023_acp[1]
                return render_template('acp_umsatz_2023_edit.html', monat=monat, umsatz=umsatz, id=id)
            else:
                return "Eintrag nicht gefunden.", 404

@app.route('/acp/umsatzrechner/2023/delete/<int:id>/', methods=['POST'])
def acp_umsatz_2023_delete(id):
    connection = get_db_connection()
    if connection:
        try:
            cursor = connection.cursor()
            cursor.execute("DELETE FROM umsatz_2023 WHERE id = %s", (id,))
            connection.commit()
            cursor.close()
        except Error as e:
            print(f"Fehler beim Löschen des Eintrags: {e}")
            connection.rollback()
        finally:
            connection.close()
        return redirect('/acp/umsatzrechner/2023/')
    else:
        return "Es gibt ein Problem bei der Datenbankverbindung. Die Seite wird aus Sicherheitsgründen nicht geladen.", 500

################################################################ ZUKÜNFTIGE AUSLAGERUNG, SIEHE BLOG ################################################################################
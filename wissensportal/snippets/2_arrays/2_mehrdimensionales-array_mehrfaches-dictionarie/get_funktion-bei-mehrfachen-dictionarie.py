personen = [
    {
    "Name": "Klara",
    "Alter": 32,
    "Geschlecht": "Weiblich"
    },

    {
    "Name": "Peter",
    "Alter": 25,
    "Geschlecht": "Männlich"
    },
    
    {
    "Name": "Hans-Franz",
    "Alter": 86,
    "Geschlecht": "Männlich"
    }
]

# Wenn das Gewünschte vorhanden ist, wird es ausgegeben
print (f"Die Suche lieferte ein Ergebnis: {personen[0].get('Name', True)}")

# Wenn KEIN Eintrag vorhanden ist, wird eine Fehlermeldung ausgespuckt
print(personen[0].get("Hautfarbe", "Deine Suche ergab keinen Treffer."))
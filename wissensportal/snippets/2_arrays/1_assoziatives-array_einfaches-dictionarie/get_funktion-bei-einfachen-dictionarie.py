meine_person = {
    "Vorname": "Sven",
    "Zweitname": "Oliver",
    "Nachname": "Berger",
    "Augenfarbe": "Blau",
    "Beruf": "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
}

print (f"Die Suche lieferte ein Ergebnis: {meine_person.get('Vorname', True)}")
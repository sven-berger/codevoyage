meine_person = {
    "Vorname": "Sven",
    "Zweitname": "Oliver",
    "Nachname": "Berger",
    "Augenfarbe": "Blau",
    "Beruf": "Umschulung zum Fachinformatiker für Anwendungsentwicklung"
}

del meine_person["Beruf"]

meine_person["Katze"] = {"Name": "Anton", "Spitzname": "Fettsack", "Beruf": "Arbeitslos"}
del meine_person["Katze"]["Spitzname"]
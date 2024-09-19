tierliste = []

# Eingabe von Tierinformationen
name = input("Bitte gib den Namen des Tieres ein: ")
art = input("Bitte gib die Art des Tieres ein: ")
anzahl = int(input("Bitte gib an, ob das Tier 2 oder 4 Beine hat: "))

# Erstelle ein neues Dictionary für das Tier und füge es zur Liste hinzu
tiere = {
    "Name": name,
    "Art": art,
    "Anzahl der Beine": anzahl
}

tierliste.append(tiere)

# Ausgabe der Informationen aller Tiere in der Liste
for tiere in tierliste:
    for key, value in tiere.items():
        print(f"{key}: {value}")
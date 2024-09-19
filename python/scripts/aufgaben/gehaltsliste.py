# Lege eine Liste mit Mitarbeitern an
# Jeder Mitarbeiter hat einen Namen, eine Berufsbezeichnung und ein Gehalt.
# Füge der Liste 5 Mitarbeiter hinzu.
# Rechne das Gehalt aller Mitarbeiter zusammen (Schleife).

mitarbeiter = []


mitarbeiter.append({
    "Name": "Hans Franz",
    "Berufsbezeichnung": "Clown",
    "Gehalt": 2000
})

mitarbeiter.append({
    "Name": "Hannelore",
    "Berufsbezeichnung": "Erzieher",
    "Gehalt": 1800
})

mitarbeiter.append({
    "Name": "Sven",
    "Berufsbezeichnung": "Informatiker",
    "Gehalt": 3300
})

mitarbeiter.append({
    "Name": "Uschi",
    "Berufsbezeichnung": "Verkäuferin",
    "Gehalt": 2000
})

mitarbeiter.append({
    "Name": "Peter",
    "Berufsbezeichnung": "Anwalt",
    "Gehalt": 6000
})


gesamtes_gehalt = 0
for person in mitarbeiter:
    gesamtes_gehalt += person["Gehalt"]
    
    
print(f"Das Gehalt aller Personen beträgt: {gesamtes_gehalt}€")
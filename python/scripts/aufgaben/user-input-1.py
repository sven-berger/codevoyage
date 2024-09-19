tierliste = {
    "Name": "",
    "Art": "",
    "Beinchen": 0
}

# Eingabe der Tierinformationen
tierliste["Name"] = input("Bitte gib den Namen des Tieres ein: ")
tierliste["Art"] = input("Bitte gib die Art des Tieres an: ")
tierliste["Beinchen"] = int(input("Bitte gib die Anzahl der Beinchen an: "))

# Ausgabe der Informationen
for key, value in tierliste.items():
    print(f"{key}: {value}")
tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"]

#Elemente austauschen
tiere[1] = "Elefant"

#Elemente anfügen am ENDE
neue_tiere = []
neue_tiere.append("Stier")
neue_tiere.append("Gorilla")

#Elemente an bestimmte Stelle einsetzen
neue_tiere.insert(1, "Katze")

#Das letzte Element entfernen
neue_tiere.pop()

#Bestimmtes Element entfernen
#del = Löscht Element dauerhaft
#pop = Entfernt nur temporär aus der Liste
del neue_tiere[0]

#Element mit Namen ansprechen und löschen
tiere.remove("Nashorn")
mitarbeiter = {}

while True:
    name = input("Bitte gib den Namen des Mitarbeiters ein: ")
    gehalt = int(input("Bitte gib das Jahresgehalt des Mitarbeiters ein: "))
    
    mitarbeiter[name] = gehalt
    
    alle_mitarbeiter = len(mitarbeiter)
    if alle_mitarbeiter >= 5:
        break

print(mitarbeiter)
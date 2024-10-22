try:
    erste_zahl = float(input("Bitte gib deine erste Zahl ein: "))
    zweite_zahl = float(input("Bitte gib deine zweite Zahl ein: "))
    rechenoperation = input("Bitte gib die Rechenoperation ein: (Addition, Subtraktion, Multiplikation oder Division) ")

    if rechenoperation == "Addition":
        print("Das Ergebnis ist:", erste_zahl + zweite_zahl)
    elif rechenoperation == "Subtraktion":
        print("Das Ergebnis ist:", erste_zahl - zweite_zahl)
    elif rechenoperation == "Multiplikation":
        print("Das Ergebnis ist:", erste_zahl * zweite_zahl)
    elif rechenoperation == "Division":
        if zweite_zahl != 0:
            print("Das Ergebnis ist:", erste_zahl / zweite_zahl)
        else:
            print("Division durch 0 ist nicht möglich.")
    else:
        print("Du hast eine ungültige Operation angegeben!")
except ValueError:
    print("Ungültige Eingabe! Bitte gib nur Zahlen ein.")
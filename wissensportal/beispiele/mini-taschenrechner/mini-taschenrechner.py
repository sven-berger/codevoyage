try:
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
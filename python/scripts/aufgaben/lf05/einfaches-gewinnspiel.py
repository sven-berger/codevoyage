eingabe = 0
while eingabe != 7:
    eingabe = int(input("Bitte gib eine Zahl zwischen 1 - 10 ein! "))
    if eingabe == 7:
        print("Herzlichen Glückwunsch, du hast richtig geraten!")
    else:
        print("Leider falsch, versuche es erneut.")
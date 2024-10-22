zahl = float(input("Bitte gib eine Zahl ein: "))
vergleich = float(input("Bitte gib eine Zahl ein, mit der du deine Zahl vergleichen möchtest: "))

if zahl < vergleich:
    print("Deine Zahl ist kleiner.")
elif zahl > vergleich:
    print("Deine Zahl ist größer.")
else:
    print("Du hast die selbe Zahl eingegeben.")
    
zahl2 = float(input("Bitte gib eine zweite Zahl ein: "))
vergleich2 = float(input("Bitte gib eine zweite Zahl ein, mit der du deine (zweite) Zahl vergleichen möchtest: "))

if zahl <= vergleich:
    print("Deine Zahl ist kleiner oder gleich.")
elif zahl >= vergleich:
    print("Deine Zahl ist größer oder gleich.")
else:
    print("Du hast die selbe Zahl eingegeben.")
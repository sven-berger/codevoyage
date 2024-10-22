zahl = float(input("Bitte gib eine Zahl ein: "))
vergleich = float(input("Bitte gib eine Zahl ein, mit der du deine Zahl vergleichen möchtest: "))

if zahl <= vergleich:
    print(zahl, "ist kleiner oder gleich als", vergleich)
elif zahl >= vergleich:
    print(zahl, "ist größer oder gleich als", vergleich)
else:
    print("Du hast die selbe Zahl eingegeben.")
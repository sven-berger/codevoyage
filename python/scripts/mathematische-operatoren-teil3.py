zahl = float(input("Bitte gib eine Zahl ein: "))
vergleich = float(input("Bitte gib eine Zahl ein, mit der du deine Zahl vergleichen möchtest: "))

if zahl == vergleich:
    print(zahl, "und", vergleich, "sind gleich")
elif zahl != vergleich:
    print(zahl, "und", vergleich, "sind ungleich")
else:
    print("Du hast die selbe Zahl eingegeben.")
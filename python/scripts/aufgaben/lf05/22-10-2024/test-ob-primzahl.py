zahl = int(input("Bitte gib eine Zahl ein: "))

if zahl <= 1:
    print(f"{zahl} ist keine Primzahl.")
else:
    ist_primzahl = True
    for i in range(2, int(zahl**0.5) + 1):
        if zahl % i == 0:
            ist_primzahl = False  

    if ist_primzahl:
        print(f"{zahl} ist eine Primzahl.")
    else:
        print(f"{zahl} ist keine Primzahl.")
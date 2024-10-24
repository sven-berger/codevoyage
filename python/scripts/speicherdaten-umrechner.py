umrechnung = {
    "Byte": 1,
    
    "GiB": 1024**3,
    "MiB": 1024**2,
    "KiB": 1024,
    
    "GB": 1000**3,
    "MB": 1000**2,
    "KB": 1000,
    
    "Bit": 1 / 8
}

zahl = float(input("Bitte gib die Zahl ein, die du umrechnen möchtest: "))
ausgang = input("Von welcher Einheit möchtest du umrechnen? (GiB, MiB, KiB, GB, MB, KB, Byte, Bit): ")
ziel = input("In welche Einheit möchtest du umrechnen? (GiB, MiB, KiB, GB, MB, KB, Byte, Bit): ")
    
if ausgang in umrechnung and ziel in umrechnung:
    zahl_in_bytes = zahl * umrechnung[ausgang]
    ergebnis = zahl_in_bytes / umrechnung[ziel]
    print(f"{zahl} {ausgang} entsprechen {ergebnis} {ziel}.")
else:
    print("Ungültige Einheit! Bitte gib GiB, MiB, KiB, GB, MB, KB, B, Bit ein.")

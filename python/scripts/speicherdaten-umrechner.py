umrechnung = {
    "B": 1,
    "KB": 1000,
    "MB": 1000 ** 2,
    "GB": 1000 ** 3,
    "Bit": 1 / 8,
    "KiB": 1024,
    "MiB": 1024 ** 2,
    "GiB": 1024 ** 3
}

vorhandene_einheit = float(input("Bitte gib die Zahl ein, die du umrechnen möchtest: "))
vorhandener_praefix = input("Von welcher Einheit möchtest du umrechnen? (GiB, MiB, KiB, GB, MB, KB, Byte, Bit): ")
gesuchter_praefix = input("In welche Einheit möchtest du umrechnen? (GiB, MiB, KiB, GB, MB, KB, Byte, Bit): ")
    
if vorhandener_praefix in umrechnung and gesuchter_praefix in umrechnung:
    zahl_in_bytes = vorhandene_einheit * umrechnung[vorhandener_praefix]
    ergebnis = zahl_in_bytes / umrechnung[gesuchter_praefix]
    print(f"{vorhandene_einheit} {vorhandener_praefix} entsprechen {ergebnis} {gesuchter_praefix}.")
else:
    print("Ungültige Einheit! Bitte gib GiB, MiB, KiB, GB, MB, KB, B, Bit ein.")
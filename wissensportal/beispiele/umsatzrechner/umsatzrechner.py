monatlicher_umsatz = [1000, 2000, 3000, 5035, 2341, 900, 1224, 5342, 2345, 6445, 1243, 4673]
gesamtumsatz = sum(monatlicher_umsatz)
guter_monat = 0
anzahl_gute_monate = 0

for umsatz in monatlicher_umsatz:
    if umsatz >= guter_monat:
        anzahl_gute_monate += 1

print("Der Gesamtumsatz beträgt:", gesamtumsatz)
print("Anzahl der guten Monate:", anzahl_gute_monate)
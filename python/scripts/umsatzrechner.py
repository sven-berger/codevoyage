januar = float(input("Bitte gib den Umsatz für Januar an: "))
februar = float(input("Bitte gib den Umsatz für Februar an: "))
maerz = float(input("Bitte gib den Umsatz für März an: "))
april = float(input("Bitte gib den Umsatz für April an: "))
mai = float(input("Bitte gib den Umsatz für Mai an: "))
juni = float(input("Bitte gib den Umsatz für Juni an: "))
juli = float(input("Bitte gib den Umsatz für Juli an: "))
august = float(input("Bitte gib den Umsatz für August an: "))
september = float(input("Bitte gib den Umsatz für September an: "))
oktober = float(input("Bitte gib den Umsatz für Oktober an: "))
november = float(input("Bitte gib den Umsatz für November an: "))
dezember = float(input("Bitte gib den Umsatz für Dezember an: "))
guter_monat = float(input("Bitte gib zum Schluss noch an, was für dich ein guter Monat ist: "))

monatlicher_umsatz = [januar, februar, maerz, april, mai, juni, juli, august, september, oktober, november, dezember]
gesamtumsatz = sum(monatlicher_umsatz)

anzahl_gute_monate = 0
umsatz_gute_monate = 0

for umsatz in monatlicher_umsatz:
    if umsatz >= guter_monat:
        anzahl_gute_monate += 1
        umsatz_gute_monate += umsatz

print("Der Gesamtumsatz beträgt: " + str(gesamtumsatz) + "€")
print("Anzahl der guten Monate: " + str(anzahl_gute_monate) + " Monate")
print("Umsatz der guten Monate: " + str(umsatz_gute_monate) + "€")
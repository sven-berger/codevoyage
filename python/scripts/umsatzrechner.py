januar = int(input("Bitte gib den Umsatz für Januar an: "))
februar = int(input("Bitte gib den Umsatz für Februar an: "))
maerz = int(input("Bitte gib den Umsatz für März an: "))
april = int(input("Bitte gib den Umsatz für April an: "))
mai = int(input("Bitte gib den Umsatz für Mai an: "))
juni = int(input("Bitte gib den Umsatz für Juni an: "))
juli = int(input("Bitte gib den Umsatz für Juli an: "))
august = int(input("Bitte gib den Umsatz für August an: "))
september = int(input("Bitte gib den Umsatz für September an: "))
oktober = int(input("Bitte gib den Umsatz für Oktober an: "))
november = int(input("Bitte gib den Umsatz für November an: "))
dezember = int(input("Bitte gib den Umsatz für Dezember an: "))
guter_monat = int(input("Bitte gib zum Schluss noch an, was für dich ein guter Monat ist: "))

monatlicher_umsatz = [januar, februar, maerz, april, mai, juni, juli, august, september, oktober, november, dezember]
gesamtumsatz = sum(monatlicher_umsatz)

anzahl_gute_monate = 0
umsatz_gute_monate = 0

for umsatz in monatlicher_umsatz:
    if umsatz >= guter_monat:
        umsatz_gute_monate += umsatz
        anzahl_gute_monate += 1

print("Der Gesamtumsatz beträgt: " + str(gesamtumsatz) + "€")
print("Anzahl der guten Monate: " + str(anzahl_gute_monate))
print("Umsatz der guten Monate: " + str(umsatz_gute_monate) + "€")
tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"]

print(f"Unsortierte Liste {tiere}")

tiere_temporaer = sorted(tiere)
print(f"Sortierte Liste: {tiere_temporaer}")

#Liste sortiert ausgeben (temporär)
tiere.sort()
print(tiere)

#Liste umgekehrt sortiert (temporär)
tiere.sort(reverse=True)
print(tiere)
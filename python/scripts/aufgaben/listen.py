# Liste mit 100 Werten anlegen (1 - 100)
# Zwei leere Listen (list_a und list_b) anlegen
# Für jeden Wert in der Liste überprüfen, ob der Wert durch 5 geteilt werden kann
# Wenn der Wert durch 5 geteilt werden kann -> list_a hinzufügen
# Wenn der Wert nicht durch 5 geteilt werden kann -> list_b hinzufügen

zahlen = list(range(1,101))
list_a = []
list_b = []

for zahl in zahlen:
    if zahl % 2 == 0:
       list_a.append(zahl)
    else:
        list_b.append(zahl)
    
print(f"Zahlen die durch 2 teilbar sind: {list_a}")
print(f"Zahlen die NICHT durch 2 teilbar sind: {list_b}")
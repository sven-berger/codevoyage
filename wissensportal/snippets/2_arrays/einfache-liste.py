tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"]
print(tiere)
print(tiere[1])
print(tiere[0], tiere[1], tiere[2], tiere[3], tiere[4], tiere[5])

#Das letzte Element
print(tiere[-1])

#Das Vorletzte etc. ...
print(tiere[-2])

### 
# Per Doppelpunkt entscheiden was VON - BIS rausgegriffen werden soll
# Ohne Wert nach dem Doppelpunkt bedeutet: Bis zum Ende
###

## Nashorn, Zebra, Esel
print(tiere[-3:])

#Nashorn, Zebra 
print(tiere[-3:5])
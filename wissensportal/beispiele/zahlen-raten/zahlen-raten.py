import random

zufallszahl = random.randint(1, 100)
eingabe = 12

while eingabe != zufallszahl:
    if eingabe < zufallszahl:
        print("Höher!")
    elif eingabe > zufallszahl:
        print("Niedriger!")
    eingabe = int(input("Bitte gib eine neue Zahl ein: "))
print("Glückwunsch, du hast die richtige Zahl geraten!")
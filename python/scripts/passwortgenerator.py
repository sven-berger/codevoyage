import random

laenge = int(input("Bitte gib die gewünschte Länge ein (Maximal 81 Zeichen): "))

kleine_buchstaben = "abcdefghijklmnopqrstuvwxyz"
grosse_buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
zahlen = "0123456789"
symbole = "!@#$%^&*()_-+=?><[]"
zusammengesetzt = kleine_buchstaben + grosse_buchstaben + zahlen + symbole
passwort = ''.join(random.sample(zusammengesetzt, laenge))

print("Das Passwort lautet:", passwort)
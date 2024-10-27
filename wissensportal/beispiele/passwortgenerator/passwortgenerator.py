import random

laenge = 15

kleine_buchstaben = "abcdefghijklmnopqrstuvwxyz"
grosse_buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
zahlen = "0123456789"
symbole = "!@#$%^&*()_-+=?><[]"
zusammengesetzt = kleine_buchstaben + grosse_buchstaben + zahlen + symbole
passwort = ''.join(random.sample(zusammengesetzt, laenge))

print("Das Passwort lautet:", passwort)
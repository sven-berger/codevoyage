import random

def generiere_passwort(laenge):
    if 1 <= laenge <= 81:
        kleine_buchstaben = "abcdefghijklmnopqrstuvwxyz"
        grosse_buchstaben = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"
        zahlen = "0123456789"
        symbole = "!@#$%^&*()_-+=?><[]"
        zusammengesetzt = kleine_buchstaben + grosse_buchstaben + zahlen + symbole
        passwort = ''.join(random.sample(zusammengesetzt, laenge))
        return passwort
    else:
        return None
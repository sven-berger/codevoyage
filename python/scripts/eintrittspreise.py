age = 18

if age <= 6 or age >= 60:
    print(f"Eintritt: Kostenlos")
elif age >= 7  and age <= 17:
    print (f"Eintritt: 2,50€")
elif age > 17 and age <= 30:
    print (f"Eintritt: 3€")
else:
    print(f"Eintritt: 3,50€")
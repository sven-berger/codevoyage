age = 18

if age <= 6 or age >= 60:
    print(f"Der Eintritt ist für dich kostenlos")
elif age >= 7  and age <= 17:
    print (f"Der Eintritt kostet für dich: 2,50€")
elif age > 17 and age <= 30:
    print (f"Der Eintritt kostet für dich: 3€")
else:
    print(f"Der Eintritt kostet für dich: 3,50€")
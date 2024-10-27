personen = [
    {
    "Name": "Klara",
    "Alter": 32,
    "Geschlecht": "Weiblich"
    },

    {
    "Name": "Peter",
    "Alter": 25,
    "Geschlecht": "Männlich"
    },
    
    {
    "Name": "Hans-Franz",
    "Alter": 86,
    "Geschlecht": "Männlich"
    }
]


personen[0]["Alter"] = "1"
personen[1]["Name"] = "Uschi"

for person in personen:
    print(f"Der Name ist {person['Name']}, die Person ist {person['Geschlecht'].lower()} und {person['Alter']} Jahre alt.")
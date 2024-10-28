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


personen[0]["Alter"] = "100000"
personen[1]["Name"] = "Lorem Ipsum dolor sit amet"

for person in personen:
    print(person)
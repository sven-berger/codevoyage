autos = []

def auto_bauen(marke, farbe, preis, anzahl = 5):
    auto = {
        "Marke": marke,
        "Farbe": farbe,
        "Preis": preis,
        "Anzahl der Türen": anzahl
    }
    
    autos.append(auto)

auto_bauen("Mercedes", "Blau", "2000")
auto_bauen("BMW", "Schwarz", "2000")
auto_bauen("Toyota", "Gelb", "2000", "2")

for auto in autos:
    for key, value in auto.items():
        print(f"{key}: {value}")
    print() 
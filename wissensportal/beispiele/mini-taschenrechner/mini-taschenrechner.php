<label for="rechenoperation">Bitte wähle die Rechenoperation:</label>
<select name="rechenoperation" id="rechenoperation">
    <option value="Addition">Addition</option>
    <option value="Subtraktion">Subtraktion</option>
    <option value="Multiplikation">Multiplikation</option>
    <option value="Division">Division</option>
</select>

 <?php 
    $erste_zahl = (float)$_GET['erste_zahl'];
    $zweite_zahl = (float)$_GET['zweite_zahl'];
    $operation = $_GET['rechenoperation'];

    try {
        switch ($operation) {
            case 'Addition':
                echo "Das Ergebnis ist: " . $erste_zahl + $zweite_zahl;
                break;
            case 'Subtraktion':
                echo "Das Ergebnis ist: " . $erste_zahl - $zweite_zahl;
                break;
            case 'Multiplikation':
                echo "Das Ergebnis ist: " . $erste_zahl * $zweite_zahl;
                break;
            case 'Division':
                if ($zweite_zahl != 0) {
                    echo "Das Ergebnis ist: " . $erste_zahl / $zweite_zahl;
                } else {
                    echo "<span>Division durch 0 ist nicht möglich.";
                }
                break;
            default:
                echo "Ungültige Rechenoperation.";
        }
    } catch (Exception $e) {
        echo "Fehler: " . $e->getMessage();
    }
?>
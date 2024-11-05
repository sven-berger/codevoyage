<?php
    $bereich = 'PHP-Bereich';
    $pageTitle = "Mini-Taschenrechner";
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/header/instance.header.inc.php");
?>

<form action="mini-taschenrechner.php" method="get" class="form-taschenrechner">
    <label for="erste_zahl">Bitte gib die erste Zahl ein:</label>
    <input type="number" id="erste_zahl" name="erste_zahl" required>
    
    <label for="zweite_zahl">Bitte gib die zweite Zahl ein:</label>
    <input type="number" id="zweite_zahl" name="zweite_zahl" required>
    
    <label for="rechenoperation">Bitte wähle die Rechenoperation:</label>
    <select name="rechenoperation" id="rechenoperation">
        <option value="Addition">Addition</option>
        <option value="Subtraktion">Subtraktion</option>
        <option value="Multiplikation">Multiplikation</option>
        <option value="Division">Division</option>
    </select>
    <button type="submit">Eingabe abschicken</button>
</form>

<?php
if (isset($_GET['erste_zahl']) && isset($_GET['zweite_zahl']) && isset($_GET['rechenoperation'])): ?>
</div>
</section> 

<section class="section">
<div class="sectionContent">
    <?php 
        $erste_zahl = (float)$_GET['erste_zahl'];
        $zweite_zahl = (float)$_GET['zweite_zahl'];
        $operation = $_GET['rechenoperation'];
    ?>

    <?php
    try {
        switch ($operation) {
            case 'Addition':
                echo "<div class='sectionHeader'>Das Ergebnis ist:</div><br>" . $erste_zahl + $zweite_zahl;
                break;
            case 'Subtraktion':
                echo "<div class='sectionHeader'>Das Ergebnis ist:</div><br>" . $erste_zahl - $zweite_zahl;
                break;
            case 'Multiplikation':
                echo "<div class='sectionHeader'>Das Ergebnis ist:</div><br>" . $erste_zahl * $zweite_zahl;
                break;
            case 'Division':
                if ($zweite_zahl != 0) {
                    echo "<div class='sectionHeader'>Das Ergebnis ist:</div><br>" . $erste_zahl / $zweite_zahl;
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
<?php endif; ?>


<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/footer/php.footer.inc.php");
?>
<?php

    class OrtsListe {

    public function buchstaben () {
        $start = ord('A');
        $ende = ord('Z');
        $buchstaben = [];
    
        for ($x = $start; $x <= $ende; $x++) {
            $buchstaben[] = chr($x);
        }

        echo "<ul class='buchstaben-auflistung'>";
        foreach ($buchstaben as $zeichen) {
            echo "<li><a href='index.php?page=ortsliste&buchstabe=" . $zeichen . "' class='button'>" . $zeichen . "</a></li>"; 
        }
        echo "</ul>";
    }

    public function ortsnamen($connection) {
        $buchstabe = isset($_GET['buchstabe']) && preg_match('/^[A-Z]$/', $_GET['buchstabe']) ? $_GET['buchstabe'] : 'A';
        $statement = $connection->prepare('SELECT * FROM `ortsliste` WHERE `stadt` LIKE :zeichen ORDER BY `stadt` ASC');
        $statement->bindValue(':zeichen', $buchstabe . '%', PDO::PARAM_STR);
        $statement->execute();
        $orte = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($orte) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Stadt</th>";
            echo "<th>Kreis</th>";
            echo "<th>Bundesland</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($orte as $ort) {
                echo "<tr>";
                echo "<td><strong>" . htmlspecialchars($ort['stadt']) . "</strong></td>";
                echo "<td>" . htmlspecialchars($ort['kreis']) . "</td>";
                echo "<td>" . htmlspecialchars($ort['bundesland']) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Keine Städte mit '$buchstabe' gefunden.";
        }
    }

    public function ortsnamenZaehlen ($connection) {
        $statement = $connection->prepare('SELECT COUNT(*) FROM `ortsliste`');
        $statement->execute();
        $anzahl = $statement->fetchColumn();
        echo "<div class='stadtanzahl'>Eingetragene Orte aus Deutschland: <strong>{$anzahl}</strong> (Stand: 02.04.2025)</div>";
    }
}

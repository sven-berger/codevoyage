<?php

    class StadtListe {

    public function buchstaben () {
        $start = ord('A');
        $ende = ord('Z');
        $buchstaben = [];
    
        for ($x = $start; $x <= $ende; $x++) {
            $buchstaben[] = chr($x);
        }

        echo "<ul class='buchstaben-auflistung'>";
        foreach ($buchstaben as $zeichen) {
            echo "<li><a href='index.php?page=stadtliste&buchstabe=" . $zeichen . "' class='button'>" . $zeichen . "</a></li>"; 
        }
        echo "</ul>";
    }

    public function stadtnamen($connection) {
        $buchstabe = isset($_GET['buchstabe']) && preg_match('/^[A-Z]$/', $_GET['buchstabe']) ? $_GET['buchstabe'] : 'A';
        $statement = $connection->prepare('SELECT * FROM `stadtliste` WHERE `stadt` LIKE :zeichen ORDER BY `stadt` ASC');
        $statement->bindValue(':zeichen', $buchstabe . '%', PDO::PARAM_STR);
        $statement->execute();
        $städte = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($städte) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Stadt</th>";
            echo "<th>Kreis</th>";
            echo "<th>Bundesland</th>";
            echo "<th>Geodaten</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($städte as $stadt) {
                echo "<tr>";
                echo "<td>" . (int)$stadt['id'] . "</td>";
                echo "<td><strong>" . htmlspecialchars($stadt['stadt']) . "</strong></td>";
                echo "<td>" . htmlspecialchars($stadt['kreis']) . "</td>";
                echo "<td>" . htmlspecialchars($stadt['bundesland']) . "</td>";
                echo "<td>" . htmlspecialchars($stadt['lat']) . " / " . htmlspecialchars($stadt['lon']) . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Keine Städte mit '$buchstabe' gefunden.";
        }
    }

    public function stadtnamenZaehlen ($connection) {
        $statement = $connection->prepare('SELECT COUNT(*) FROM `stadtliste`');
        $statement->execute();
        $anzahl = $statement->fetchColumn();
        echo "<div class='stadtanzahl'>Eingetragene Orte aus Deutschland: <strong>{$anzahl}</strong> (Stand: 24.03.2025)</div>";
    }
}

<?php
    class AdmissionList {
        private $alter_von;
        private $alter_bis;
        private $eintrittspreise;
        private $connection;

        public function __construct($alter_von, $alter_bis, $eintrittspreise, PDO $connection) {
            $this->alter_von = $alter_von;
            $this->alter_bis = $alter_bis;
            $this->eintrittspreise = $eintrittspreise;
            $this->connection-> $connection;
        }

        public function getAddmissions() {
            $statement = $connection->query("SELECT * FROM eintrittspreise");
            $statement->execute();
            $eintrittspreise = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function setAdmissions() {
            $statement = $connection->query("UPDATE SET eintrittspreise (alter_von, alter_bis, eintrittspreise) VALUES (:alter_von, :alter_bis, :eintrittspreise");
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':alter_von', $this->alter_von);
            $statement->bindParam(':alter_von', $this->alter_bis);
            $statement->bindParam(':alter_von', $this->eintrittspreise);
            $statement->execute();
            $data = $statement->fetch(PDO::FETCH_ASSOC);
        }
            
        /*
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Alter von</th>";
            echo "<th>Alter bis</th>";
            echo "<th>Eintrittspreis</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($eintrittspreise as $details) { 
                echo "<tr>";
                echo "<td>" . $details['alter_von'] . "</td>"; 
                echo "<td>" . $details['alter_bis'] . "</td>"; 
                echo "<td>" . $details['eintrittspreis']. "</td>"; 
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            */
    }
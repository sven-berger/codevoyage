<?php
class Gewinnspiel {
    private $gewinnerzahl; 
    private $connection;

    public function __construct($connection, $gewinnerzahl) {
        $this->connection = $connection;
        $this->gewinnerzahl = $gewinnerzahl; 
    }
    
    public function getDataSql() {
        $statement = $this->connection->prepare("SELECT gewinnerzahl FROM gewinnspiel LIMIT 1");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return (int)$result['gewinnerzahl'];
        } else {
            return null;
        }
    }

    public function checkGewinnerzahl($eingabe) {
        $echteGewinnerzahl = $this->getDataSql();
        if ($eingabe == $echteGewinnerzahl) {
            echo "Herzlichen Glückwunsch! Sie haben gewonnen!";
        } else {
            echo "Leider kein Gewinn. Versuchen Sie es erneut.";
        }
    }
}
<?php
class GewinnspielTabelle {
    private $daten = [];

    public function getDataSql($connection) {
        $statement = $connection->prepare("SELECT * FROM gewinnspiel ORDER BY id DESC");
        $statement->execute();
        $this->daten = $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDaten() {
        return $this->daten;
    }

    public function datumFormatieren($datum) {
        return date("d.m.Y", strtotime($datum)); 
    }
}
?>
<?php
class Konto {
    private $inhaber;
    private $iban;
    private $kontostand;

    public function __construct(string $inhaber, string $iban, float $kontostand) {
        $this->inhaber = $inhaber;
        $this->iban = $iban;
        $this->kontostand = $kontostand;
    }

    public static function datenEintragenSql($connection, $inhaber, $iban, $kontostand) {
        $sql = "INSERT INTO bankkonten (inhaber, iban, kontostand) VALUES (:inhaber, :iban, :kontostand)";
        $statement = $connection->prepare($sql);
        $statement->execute([
            ':inhaber' => $inhaber,
            ':iban' => $iban,
            ':kontostand' => $kontostand
        ]);
    }

    public static function datenBearbeitenSqL($connection, $inhaber, $iban, $kontostand) {
        $sql = "UPDATE bankkonten SET inhaber = :inhaber, iban = :iban, kontostand = :kontostand";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':inhaber', $inhaber, PDO::PARAM_STR);
        $statement->bindParam(':iban', $iban, PDO::PARAM_STR);
        $statement->bindParam(':kontostand', $kontostand, PDO::PARAM_STR);
    }

    public static function datenAbrufenSql($connection) {
        $sql = "SELECT * FROM bankkonten";
        $statement = $connection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function datenVerarbeiten(array $daten) {
        $objekte = [];
        foreach ($daten as $datensatz) {
            $objekte[] = new Konto($datensatz['inhaber'], $datensatz['iban'], $datensatz['kontostand']);
        }
        return $objekte;
    }

    public function getInhaber() {
        return $this->inhaber;
    }
    
    public function getIban() {
        return $this->iban;
    }
    
    public function getKontostand() {
        return $this->kontostand;
    }
}

// Eintrag verarbeiten
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inhaber'], $_POST['iban'], $_POST['kontostand'])) {
    $inhaber = htmlspecialchars($_POST['inhaber']);
    $iban = htmlspecialchars($_POST['iban']);
    $kontostand = (float)$_POST['kontostand'];

    Konto::datenEintragenSql($connection, $inhaber, $iban, $kontostand);
}
?>
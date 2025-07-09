<?php
class Gewinnspiel {
    private $gewinnerzahl;
    private $zeitraumVon;
    private $zeitraumBis;

    public function __construct($gewinnerzahl, $zeitraumVon, $zeitraumBis) {
        $this->gewinnerzahl = $gewinnerzahl;
        $this->zeitraumVon = $zeitraumVon;
        $this->zeitraumBis = $zeitraumBis;
    }

    public function setDataSql($connection) {
        $statement = $connection->prepare("
            INSERT INTO gewinnspiel (gewinnerzahl, zeitraumVon, zeitraumBis) 
            VALUES (:gewinnerzahl, :zeitraumVon, :zeitraumBis)
        ");
        $statement->bindParam(":gewinnerzahl", $this->gewinnerzahl, PDO::PARAM_INT);
        $statement->bindParam(":zeitraumVon", $this->zeitraumVon);
        $statement->bindParam(":zeitraumBis", $this->zeitraumBis);

        if ($statement->execute()) {
            header("Location: ../acp/index.php?page=raffle");
            exit;
        } else {
            echo "Eintrag fehlgeschlagen!";
        }
    }
}
?>

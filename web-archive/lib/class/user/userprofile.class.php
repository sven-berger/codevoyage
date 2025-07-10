<?php
class UserProfile {
    private $connection;
    private $vorname;
    private $zweitname;
    private $nachname;
    private $benutzername;
    private $benutzergruppe;
    private $beschreibung;
    private $iban;
    private $kontostand;
    private $email;
    private $id;

    public function __construct($connection, $id) {
        $this->connection = $connection;
        $this->id = $id;
    }

    public function getData($id) {
        $sql = "SELECT 
                    benutzer.id,
                    benutzer.benutzername,
                    benutzer.vorname,
                    benutzer.zweitname,
                    benutzer.nachname,
                    benutzer.email,
                    benutzer.beschreibung,
                    benutzer.iban,
                    benutzer.kontostand,
                    benutzergruppen.name AS benutzergruppe
                FROM benutzer
                JOIN benutzergruppen ON benutzer.benutzergruppe = benutzergruppen.id
                WHERE benutzer.id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->benutzername = $row['benutzername'];
        $this->vorname = $row['vorname'];
        $this->zweitname = $row['zweitname'];
        $this->nachname = $row['nachname'];
        $this->benutzergruppe = $row['benutzergruppe'];
        $this->beschreibung = $row['beschreibung'];
        $this->iban = $row['iban'];
        $this->kontostand = $row['kontostand'];
        $this->email = $row['email'];
    }

    public function getId() {
        return $this->id;
    }

    public function getBenutzername() {
        return $this->benutzername;
    }

    public function getVorname() {
        return $this->vorname;
    }

    public function getZweitname() {
        return $this->zweitname;
    }

    public function getNachname() {
        return $this->nachname;
    }

    public function getBenutzergruppe() {
        return $this->benutzergruppe;
    }

    public function getBeschreibung() {
        return $this->beschreibung;
    }

    public function getIban() {
        return $this->iban;
    }

    public function getKontostand() {
        return $this->kontostand;
    }

    public function getEmail() {
        return $this->email;
    }
}
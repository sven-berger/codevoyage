<?php
class UserProfileEdit {
    private $connection;
    private $vorname;
    private $benutzername;
    private $zweitname;
    private $nachname;
    private $beschreibung;
    private $email;
    private $id;

    public function __construct($connection, $id) {
        $this->connection = $connection;
        $this->id = $id;
    }

    public function getData($id) {
        $sql = "SELECT 
                    benutzer.benutzername,
                    benutzer.vorname,
                    benutzer.zweitname,
                    benutzer.nachname,
                    benutzer.email,
                    benutzer.beschreibung
                FROM benutzer
                WHERE benutzer.id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->benutzername = $row['benutzername'];
        $this->vorname = $row['vorname'];
        $this->zweitname = $row['zweitname'];
        $this->nachname = $row['nachname'];
        $this->beschreibung = $row['beschreibung'];
        $this->email = $row['email'];
    }

    public function dataEditSql($data) {
        $sql = "UPDATE benutzer SET
            benutzername = :benutzername,
            email = :email,
            beschreibung = :beschreibung,
            vorname = :vorname,
            zweitname = :zweitname,
            nachname = :nachname
            WHERE id = :id";
    
        $statement = $this->connection->prepare($sql);
        $statement =$this->connection->prepare($sql);
        $statement->bindParam(':benutzername', $data['benutzername']);
        $statement->bindParam(':email', $data['email']);
        $statement->bindParam(':beschreibung', $data['beschreibung']);
        $statement->bindParam(':vorname', $data['vorname']);
        $statement->bindParam(':zweitname', $data['zweitname']);
        $statement->bindParam(':nachname', $data['nachname']);
        $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->execute();
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

    public function getBeschreibung() {
        return $this->beschreibung;
    }

    public function getEmail() {
        return $this->email;
    }
}
<?php
class UserEdit {
        private $id;
        private $connection;
    
        public function __construct(PDO $connection, $id) {
            $this->connection = $connection;  // Verbindet die PDO-Verbindung
            $this->id = $id;
        }
    
        public function getData() {
            $sql = "SELECT * FROM benutzer WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
            $statement->execute();
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
        }
    
        public function getUserGroups() {
            $sql = "SELECT id, name FROM benutzergruppen";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function dataEditSql($data) {
            $sql = "UPDATE benutzer SET
                benutzername = :benutzername,
                email = :email,
                beschreibung = :beschreibung,
                iban = :iban,
                kontostand = :kontostand,
                vorname = :vorname,
                zweitname = :zweitname,
                nachname = :nachname,
                benutzergruppe = :benutzergruppe
                WHERE id = :id";
        
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':benutzername', $data['benutzername']);
            $statement->bindParam(':email', $data['email']);
            $statement->bindParam(':beschreibung', $data['beschreibung']);
            $statement->bindParam(':iban', $data['iban']);
            $statement->bindParam(':kontostand', $data['kontostand']);
            $statement->bindParam(':vorname', $data['vorname']);
            $statement->bindParam(':zweitname', $data['zweitname']);
            $statement->bindParam(':nachname', $data['nachname']);
            $statement->bindParam(':benutzergruppe', $data['benutzergruppe']);
            $statement->bindParam(':id', $this->id, PDO::PARAM_INT);
            $statement->execute();
        }
        
    }
    
    $userEdit = new UserEdit($connection, $id);
    $userEdit->getData();
    $benutzergruppen = $userEdit->getUserGroups();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userEdit->dataEditSql($_POST);
    
        // Stelle sicher, dass die Daten erfolgreich aktualisiert wurden
        if ($statement->execute()) {
            // Weiterleitung
            header('Location: ../acp/index.php?page=user');
            exit();
        }
    }
<?php

class UserList {
    private $connection;
    
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    public function getData() {
        $sql = "SELECT 
            benutzer.id,
            benutzer.benutzername,
            benutzer.email,
            benutzergruppen.name AS gruppenname
        FROM benutzer
        JOIN benutzergruppen ON benutzer.benutzergruppe = benutzergruppen.id;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
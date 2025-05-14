<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    class UserDelete {
        private $id;
        private $connection;

        public function __construct($id, $connection) {
            $this->id = $id;
            $this->connection = $connection;
        }

        public function deleteUser() {
            $sql = "DELETE FROM benutzer WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $result = $statement->execute([':id' => $this->id]);

            if ($result) {
                header("Location: index.php?page=user");
                exit; // WICHTIG: Verhindert, dass nach der Weiterleitung noch Code ausgeführt wird
            } else {
                echo "Fehler beim Löschen des Benutzers: ";
                print_r($statement->errorInfo()); // Gibt detaillierte Fehlermeldung aus
            }
        }
    }

    $userDelete = new UserDelete($id, $connection);
    $userDelete->deleteUser();
} else {
    echo "Ungültige oder fehlende Benutzer-ID!";
}
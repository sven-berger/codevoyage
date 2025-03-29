<?php
if (isset($_POST['submit'])) {
    class Registrieren {
        private $benutzername;
        private $passwort;

        public function __construct($benutzername, $passwort) {
            $this->benutzername = $benutzername;
            $this->passwort = $passwort;
        }

        public function checkVorhanden($connection) {
            $statement = $connection->prepare("SELECT * FROM benutzer WHERE benutzername = :benutzername");
            $statement->bindParam(":benutzername", $this->benutzername);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                echo "Benutzername bereits vergeben.";
                header("refresh:3; url=index.php?page=registrieren");
                exit;
            }
        }

        public function gleichesPasswort($passwort_wdh) {
            if ($this->passwort !== $passwort_wdh) {
                echo "Die Passwörter sind nicht identisch.";
                header("refresh:3; url=index.php?page=registrieren");
                exit;
            }
        }

        public function hashPasswort() {
            return password_hash($this->passwort, PASSWORD_BCRYPT);
        }

        public function datenSpeichernSql($connection) {
            $passwort_hash = $this->hashPasswort();
            $statement = $connection->prepare("INSERT INTO benutzer (benutzername, passwort) VALUES (:benutzername, :passwort)");
            $statement->bindParam(":benutzername", $this->benutzername);
            $statement->bindParam(":passwort", $passwort_hash);

            if ($statement->execute()) {
                echo "Registrierung erfolgreich!";
            } else {
                echo "Fehler bei der Registrierung!";
            }
        }
    }
}

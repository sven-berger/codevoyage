<?php
if (!empty($_POST['benutzername']) && !empty($_POST['vorname']) && !empty($_POST['passwort']) && !empty($_POST['passwort-wdh'])) {
    class Registrieren {
        private $benutzername;
        private $vorname;
        private $passwort;

        public function __construct($benutzername, $vorname, $passwort) {
            $this->benutzername = $benutzername;
            $this->vorname = $vorname;
            $this->passwort = $passwort;
        }

        public function checkVorhanden($connection) {
            $statement = $connection->prepare("SELECT * FROM benutzer WHERE benutzername = :benutzername");
            $statement->bindParam(":benutzername", $this->benutzername);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                echo "Benutzername bereits vergeben.";
                exit;
            }
        }

        public function gleichesPasswort($passwort_wdh) {
            if ($this->passwort !== $passwort_wdh) {
                echo "Die Passwörter sind nicht identisch.";
                exit;
            }
        }

        public function hashPasswort() {
            return password_hash($this->passwort, PASSWORD_BCRYPT);
        }

        public function datenSpeichernSql($connection) {
            $passwort_hash = $this->hashPasswort();
            $statement = $connection->prepare("INSERT INTO benutzer (benutzername, vorname, passwort) VALUES (:benutzername, :vorname, :passwort)");
            $statement->bindParam(":benutzername", $this->benutzername);
            $statement->bindParam(":vorname", $this->vorname);
            $statement->bindParam(":passwort", $passwort_hash);

            if ($statement->execute()) {
                header("Location: index.php");
                exit();
            } else {
                echo "Fehler bei der Registrierung!";
            }
        }
    }
}

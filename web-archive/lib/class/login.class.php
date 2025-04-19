<?php

if (isset($_POST['submit'])) {
    $benutzername = trim($_POST['benutzername']);
    $passwort = $_POST['passwort'];

    class Login {
        private $benutzername;
        private $passwort;
        private $connection;

        public function __construct($benutzername, $passwort, $connection) {
            $this->benutzername = $benutzername;
            $this->passwort = $passwort;
            $this->connection = $connection; // Verbindung speichern
        }

        public function checkBenutzer() {
            $statement = $this->connection->prepare("SELECT * FROM benutzer WHERE benutzername = :benutzername");
            $statement->bindParam(":benutzername", $this->benutzername);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC); // Rückgabe des Benutzerdatensatzes
        }

        public function checkPasswort($user) {
            if ($user && password_verify($this->passwort, $user['passwort'])) {
                $_SESSION['benutzername'] = $user['benutzername'];

                $token = bin2hex(random_bytes(32)); // Sicheres Token erstellen
                $expires = time() + (30 * 24 * 60 * 60); // 30 Tage gültig

                // Token in der Datenbank speichern
                $updateStmt = $this->connection->prepare("UPDATE benutzer SET token = :token WHERE id = :id");
                $updateStmt->bindParam(":token", $token);
                $updateStmt->bindParam(":id", $user['id']);
                $updateStmt->execute();

                // Cookie setzen (30 Tage gültig)
                setcookie("login_token", $token, [
                    'expires' => $expires,
                    'path' => '/',
                    'secure' => true,
                    'httponly' => true
                ]);

                // Aktualsieren der aktuellen Seite
                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                echo "Login fehlgeschlagen.";
            }
        }
    }
}

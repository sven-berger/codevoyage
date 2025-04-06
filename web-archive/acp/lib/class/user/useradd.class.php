
<?php
if (!empty($_POST['benutzername']) && !empty($_POST['passwort']) && !empty($_POST['email']) && !empty($_POST['beschreibung']) 
    && !empty($_POST['iban']) && !empty($_POST['kontostand']) && !empty($_POST['vorname']) && !empty($_POST['zweitname']) 
    && !empty($_POST['nachname']) && !empty($_POST['benutzergruppe'])) {

    $benutzername = htmlspecialchars($_POST['benutzername']);
    $passwort = $_POST['passwort'];
    $email = htmlspecialchars($_POST['email']);
    $beschreibung = $_POST['beschreibung'];
    $iban = htmlspecialchars($_POST['iban']);
    $kontostand = htmlspecialchars($_POST['kontostand']);
    $vorname = htmlspecialchars($_POST['vorname']);
    $zweitname = htmlspecialchars($_POST['zweitname']);
    $nachname = htmlspecialchars($_POST['nachname']);
    $benutzergruppe = htmlspecialchars($_POST['benutzergruppe']);

    class UserAdd {
        private $benutzername;
        private $passwort;
        private $email;
        private $beschreibung;
        private $iban;
        private $kontostand;
        private $vorname;
        private $zweitname;
        private $nachname;
        private $benutzergruppe;
        private $connection;

        public function __construct($benutzername, $passwort, $email, $beschreibung, $iban, $kontostand, $vorname, $zweitname, $nachname, $benutzergruppe, $connection) {
            $this->benutzername = $benutzername;
            $this->passwort = $passwort;
            $this->email = $email;
            $this->beschreibung = $beschreibung;
            $this->iban = $iban;
            $this->kontostand = $kontostand;
            $this->vorname = $vorname;
            $this->zweitname = $zweitname;
            $this->nachname = $nachname;
            $this->benutzergruppe = $benutzergruppe;
            $this->connection = $connection;
        }

        public function HashPassword() {
            return password_hash($this->passwort, PASSWORD_BCRYPT);
        }

        public function dataAddSql() {
            $sql = "INSERT INTO benutzer (benutzername, passwort, email, beschreibung, iban, kontostand, vorname, zweitname, nachname, benutzergruppe) 
                    VALUES (:benutzername, :passwort, :email, :beschreibung, :iban, :kontostand, :vorname, :zweitname, :nachname, :benutzergruppe)";

            $statement = $this->connection->prepare($sql);
            $result = $statement->execute([
                ':benutzername' => $this->benutzername,
                ':passwort' => $this->HashPassword(),
                ':email' => $this->email,
                ':beschreibung' => $this->beschreibung,
                ':iban' => $this->iban,
                ':kontostand' => $this->kontostand,
                ':vorname' => $this->vorname,
                ':zweitname' => $this->zweitname,
                ':nachname' => $this->nachname,
                ':benutzergruppe' => $this->benutzergruppe
            ]);

            if ($result) {
                echo "Benutzer erfolgreich hinzugefügt!";
                header("Location: ../acp/index.php?page=user");
                exit();
            } else {
                echo "Fehler beim Einfügen des Benutzers.";
            }
        }
    }

    $userAdd = new UserAdd($benutzername, $passwort, $email, $beschreibung, $iban, $kontostand, $vorname, $zweitname, $nachname, $benutzergruppe, $connection);
    $userAdd->dataAddSql();
}
?>
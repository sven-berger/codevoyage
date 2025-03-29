<?php
class Now {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public static function datum() {
        return date("d.m.Y"); // Datum zurückgeben
    }

    public static function uhrzeit() {
        return date("H:i"); // Uhrzeit zurückgeben
    }

    public static function tag() {
        $tag = date("l");
        $tage = [
            "Monday" => "Montag",
            "Tuesday" => "Dienstag",
            "Wednesday" => "Mittwoch",
            "Thursday" => "Donnerstag",
            "Friday" => "Freitag",
            "Saturday" => "Samstag",
            "Sunday" => "Sonntag"
        ];
        return $tage[$tag] ?? $tag; // Falls ein unbekannter Tag kommt, Standard-Wert zurückgeben
    }

    public function benutzer() {
        if (isset($_SESSION['benutzername'])) {
            $sql = "SELECT * FROM benutzer WHERE benutzername = :benutzername";
            $statement = $this->connection->prepare($sql);
            $statement->execute([':benutzername' => $_SESSION['benutzername']]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                return !empty($user['vorname']) ? "Hallo <a href=\"index.php?page=user-profile&id=" . $user['id'] . "\" style='margin-left: 0 !important;'> " . $user['vorname'] . "</a>" : "Hallo " . $user['benutzername'];
            }
        }
        return "Hallo Gast"; // Falls kein Benutzer gefunden wird
    }
}

$now = new Now($connection);

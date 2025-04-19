<?php

class Database {
    private static $host = 'server13.febas.net';
    private static $port = '3306';
    private static $database = 'codevoyage';
    private static $username = 'codevoyage';
    private static $password = 'odesjirotUjDeod}';
    private static $connection = null;

    public static function connect() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$database,
                    self::$username,
                    self::$password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Fehler: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}

// Verbindung abrufen
$connection = Database::connect();
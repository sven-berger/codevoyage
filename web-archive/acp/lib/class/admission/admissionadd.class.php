<?php
    class EintrittspreiseEintragen {
        private $alter_von;
        private $alter_bis;
        private $eintrittspreis;

        public function __construct($alter_von, $alter_bis, $eintrittspreis) {
            $this->alter_von = $alter_von;
            $this->alter_bis = $alter_bis;
            $this->eintrittspreis = $eintrittspreis;
        }

        public function addToSql($connection) {
            $statement = $connection->prepare("INSERT INTO eintrittspreise (alter_von, alter_bis, eintrittspreis) VALUES (:alter_von, :alter_bis, :eintrittspreis)");
            $statement->bindParam(':alter_von', $this->alter_von);
            $statement->bindParam(':alter_bis', $this->alter_bis);
            $statement->bindParam(':eintrittspreis', $this->eintrittspreis);
            return $statement->execute();
        }
    }
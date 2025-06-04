<?php
    class ZahlenRaten {
        public function higherRant() {
            echo "<div class='sectionHeader fail'>Höher!</div>";
            include("lib/forms/zahlen-raten.form.php");
        }

        public function lowerRant() {
            echo "<div class='sectionHeader fail'>Niedriger!</div>";
            include("lib/forms/zahlen-raten.form.php");
        }

        public function rightNumber() {
            echo "<div class='sectionHeader success'>Glückwunsch, du hast die richtige Zahl geraten!</div>";
            unset($_SESSION['zufallszahl']);
            echo "<button><a href='index.php?page=zahlen-raten'>Neues Spiel starten</a></button>";
        }
    }
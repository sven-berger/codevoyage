<?php
    class MiniTaschenrechner {
        private $zahl1;
        private $zahl2;

        public function __construct($zahl1, $zahl2) {
            $this->zahl1 = $zahl1;
            $this->zahl2 = $zahl2;
        }

        public function operationAddition() {
            echo "Das Ergebnis ist: " . ($this->zahl1 + $this->zahl2);
        }

        public function operationSubtraktion() {
            echo "Das Ergebnis ist: " . ($this->zahl1 - $this->zahl2);
        }

        public function operationMultiplikation() {
            echo "Das Ergebnis ist: " . ($this->zahl1 * $this->zahl2);
        }

        public function operationDivision() {
            if ($this->zahl2 == 0) {
                echo "<p>Durch 0 darf nicht geteilt werden!</p>";
            } else {
                echo "Das Ergebnis ist: " . ($this->zahl1 / $this->zahl2);
            }
        }
    }
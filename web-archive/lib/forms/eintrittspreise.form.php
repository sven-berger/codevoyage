<form method="POST" action="">
    <label for="alter">Bitte gib dein Alter ein</label>
    <input type="number" id="alter" name="alter">
    <button type="submit">Angeben</button>
</form>

<?php if(!empty($_POST['alter'])) {
    $alter = (int)$_POST['alter'];

    
}
?>

<!--
-->

<?php
    class Eintrittspreise {
        private $alter;

        public function __construct($alter) {
            $this->alter = $alter;
        }

        public function preisBerechnen() {

        }
    }
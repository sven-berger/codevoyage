<?php
$tiere = ["Wal", "Gans", "Affe", "Nashorn", "Zebra", "Esel"];
$counter = 0;
?>


<?php foreach ($tiere as $tier): ?>
  <?php 
    // $counter += 1;
    // echo "$counter " . "ist " . $tier . "\n";
    ?>
<?php endforeach; ?>

<?php foreach ($tiere as $tier): ?>
    <?php
        $counter += 1;
        echo "Nr. $counter " . "ist " . $tier . "\n";
    ?>
<?php endforeach; ?>
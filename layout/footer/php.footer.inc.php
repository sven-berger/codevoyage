</div>

<?php
    $php_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/php.sidebarLeft.php");
    echo $php_sidebarLeft;
?>

</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../python/templates/footer.html");
?>

</body>
</html>
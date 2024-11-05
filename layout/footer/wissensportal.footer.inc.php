</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/sidebar/wissensportal.sidebarLeft.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/sidebar/wissensportal.sidebarRight.php");
?>

</div>

<?php
    $footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");
    echo $footer;
?>

</body>
</html>



</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/acp.sidebarLeft.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/layout/sidebar/acp.sidebarRight.php");
?>

</div>

<?php
    $footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");
    echo $footer;
?>

</body>
</html>
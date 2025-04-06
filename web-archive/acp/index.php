<?php require_once("../includes/acp-header.php"); ?>
<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';
    if (file_exists("lib/" . $page . ".lib.php")) {
        include("lib/" . $page . ".lib.php");
    } elseif (isset($_GET['page']) && file_exists("lib/" . $_GET['page'] . ".lib.php")) {
        include("lib/" . $_GET['page'] . ".lib.php");
    } else {
        include("../lib/errors/404.php");
    }
?>
<?php require_once("../includes/acp-footer.php"); ?>
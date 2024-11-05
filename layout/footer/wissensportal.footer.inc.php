</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/sidebar/wissensportal.sidebarLeft.php");
    // $wissensportal_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/wissensportal.sidebarLeft.php");
   //$wissensportal_sidebarRight = file_get_contents("https://codevoyage.de/layout/sidebar/wissensportal.sidebarRight.php");
   // echo $wissensportal_sidebarLeft; 
  //  echo $wissensportal_sidebarRight;
?>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../includes/sql/wissensportal.sql.php");
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

</div>

<?php
    $footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");
    echo $footer;
?>

</body>
</html>
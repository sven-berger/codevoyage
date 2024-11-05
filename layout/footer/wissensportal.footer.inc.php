</div>

<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/sidebar/wissensportal.sidebarLeft.php");
    require_once ($_SERVER['DOCUMENT_ROOT'] . "/../layout/sidebar/wissensportal.sidebarRight.php");

    // $wissensportal_sidebarLeft = file_get_contents("https://codevoyage.de/layout/sidebar/wissensportal.sidebarLeft.php");
   //$wissensportal_sidebarRight = file_get_contents("https://codevoyage.de/layout/sidebar/wissensportal.sidebarRight.php");
   // echo $wissensportal_sidebarLeft; 
  //  echo $wissensportal_sidebarRight;
?>

</div>

<?php
    $footer = file_get_contents("https://codevoyage.de/python/templates/footer.html");
    echo $footer;
?>

</body>
</html>
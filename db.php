<?php
    $db = mysqli_connect("localhost", "root", "");
    mysqli_select_db($db, "shop");
    mysqli_set_charset($db, "utf8");

?>
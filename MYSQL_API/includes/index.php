<?php
    require_once('DBConnector.php');

    $db = new DBConnector();

    $db->connector();
    echo "DB Connection Successful.";
?>
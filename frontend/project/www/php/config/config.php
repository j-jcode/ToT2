<?php
header("Access-Control-Allow-Origin: *");
$ticwxgk_connect_xgsmrms = @mysqli_connect("127.0.0.1", "jay", "Tester1!", "talk");

if (!$ticwxgk_connect_xgsmrms) {

    echo "Error: Unable to connect to MySQL.";

    echo "<br>";

    echo "Debugging errno: ";

    echo "<br>";

    echo "Debugging error: ";

    echo "<br>";

    exit;

}



date_default_timezone_set('US/Eastern');

mysqli_query($ticwxgk_connect_xgsmrms, "SET NAMES 'utf8'");

mysqli_query($ticwxgk_connect_xgsmrms, 'SET character_set_connection=utf8');

mysqli_query($ticwxgk_connect_xgsmrms, 'SET character_set_client=utf8');

mysqli_query($ticwxgk_connect_xgsmrms, 'SET character_set_results=utf8');	


















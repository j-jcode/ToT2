<?php
include "config/config.php";


$sql = mysqli_query($ticwxgk_connect_xgsmrms,"insert into stylist set firstname='".$_GET['style_name']."', email='".$_GET['style_email']."' , reg_date='".date("Y-m-d H:i:s")."'");


$userid = mysqli_insert_id($ticwxgk_connect_xgsmrms);
echo $userid;

?>
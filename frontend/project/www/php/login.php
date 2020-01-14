<?php
include "config/config.php"; 

$sql = mysqli_query($ticwxgk_connect_xgsmrms,"select * from dados where username='".$_GET['login']."' and password='".$_GET['password']."' ");
// selects dados database with the condition with variables that will be inputed via js (textbox)
$count = mysqli_num_rows($sql); // num of rows 

$json=array();

$row = mysqli_fetch_assoc($sql);
// query object, fetch assoc breaks down object for you

/*Added the abliity to get the user_id, now i need to create a token for this user*/

if($row)
{	// json array is all that is constructed with database information
	$json['status'] = true; 
	$json['user'] = $row['username'];
	$json['id'] = $row['id'];
	$json['name'] = $row['firstname'];
}
else{$json['status'] = false;
}

/*I need to send the token, with requests, decode and check to see if user id is in db
or if id matches user login : make a php file that returns true/false inorder to prececced to other pages 

Grabbing nivel, to check if user is admin*/





echo json_encode($json);

?>
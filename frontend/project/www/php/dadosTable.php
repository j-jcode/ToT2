<?php
include "config/config.php"; 


$sql = mysqli_query($ticwxgk_connect_xgsmrms,"select * from dados");
//mysqli_query ( mysqli $link , string $query [, int $resultmode = MYSQLI_STORE_RESULT ] ) : mixed ==>>
// Returns FALSE on failure. For successful SELECT, SHOW, DESCRIBE or EXPLAIN queries mysqli_query() will return a mysqli_result object. 
//For other successful queries mysqli_query() will return TRUE.

$json=array();
/* 
if ($result = mysqli_fetch_array($sql)){
    var_dump( mysqli_fetch_fields($sql));
    //foreach allows us to iterate through the array object that was returned above
    foreach($result as $user){
        $row= mysqli_fetch_assoc($user);
        var_dump($row);
        //$json['id'] = $result['id'];
    }
} */

while($row = mysqli_fetch_array($sql)){
   $json[$row['id']]['id'] = $row['id'];
   $json[$row['id']]['login'] = $row['username'];
   $json[$row['id']]['pw'] = $row['password'];
   $json[$row['id']]['fn'] = $row['firstname'];
   $json[$row['id']]['ln'] = $row['lastname'];
   $json[$row['id']]['email'] = $row['email'];
   $json[$row['id']]['reg_date'] = $row['reg_date'];
   
}

echo json_encode($json);

?>
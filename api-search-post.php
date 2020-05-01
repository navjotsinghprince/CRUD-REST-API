<?php
//this is POST method example
header("content-type: application/json"); 
header("Access-Control-Allow-Origin: *"); 

//{"search": "prince"} suppose manlo is format me data aya hoga
//json format  me jo data ayega uske liye
$data=json_decode(file_get_contents("php://input"),TRUE); 

$search=$data['search'];

include "config.php";

$sql="SELECT * FROM students WHERE student_name LIKE '%{$search}%'";

$result=mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
  $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
  echo json_encode($output);
}else{
  echo json_encode(array("message"=> "No Search Found","status"=> FALSE));
}

?>
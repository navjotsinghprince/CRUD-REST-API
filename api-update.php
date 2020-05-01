<?php

header("Content-Type: application/json"); 
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Mehtods: PUT");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");


/* use id for update record
{  
	"sid": 2,
	"sname": "Prince",
	"sage":"24",
	"scity":"ferozepur"
}*/

//json format data converted to associative array
$data=json_decode(file_get_contents("php://input"),TRUE); 

$id=$data['sid'];
$name=$data['sname'];
$age=$data['sage'];
$city=$data['scity'];

include "config.php";

$sql="UPDATE students SET student_name='{$name}',age={$age},city='{$city}' WHERE id={$id} ";


if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=> "Student Record Updated","status"=> TRUE));
}else{
	echo json_encode(array("message"=> "Student Record Can't Updated","status"=> FALSE));
}
?>
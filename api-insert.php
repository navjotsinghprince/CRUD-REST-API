<?php

header("Content-Type: application/json");       //return json data
header("Access-Control-Allow-Origin: *");       //koi bhi website aur mobile app access kr skti hai
header("Access-Control-Allow-Mehtods: POST");   //insert ke liye post method chalega

//Authorization=koi bhi mobile app person authorization esko easily access kr sakti hai
//X-Requested-With ==jo bhi value esko mile wo sirf ajax ke through ayegi restriction laga di hai
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

/*{   Suppose ye values ayi hain ajax se
	"sname": "Prince",
	"sage":"24",
	"scity":"ferozepur"
}*/

//json format data converted to associative array
$data=json_decode(file_get_contents("php://input"),TRUE); 

$name=$data['sname'];
$age=$data['sage'];
$city=$data['scity'];

include "config.php";

$sql="INSERT INTO students(student_name,age,city) VALUES('{$name}',{$age},'{$city}')";


if(mysqli_query($conn,$sql)){
	echo json_encode(array("message"=> "Student Record Inserted","status"=> TRUE));
}else{
	echo json_encode(array("message"=> "Student Record Can't Inserted","status"=> FALSE));
}
?>





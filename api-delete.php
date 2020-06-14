<?php

header("Content-Type: application/json"); 
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Mehtods: DELETE");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");


/* use id for delete record
{  
	"sid": 2
}*/

//json format data converted to associative array
$data=json_decode(file_get_contents("php://input"),TRUE); 

$student_id=$data['sid'];

include "config.php";

//Check student record exist or not if exists then we delete 
$sql1="SELECT * FROM students WHERE id={$student_id}";
$result1=mysqli_query($conn,$sql1) or die("SQL Query Failed: Check record");

if(mysqli_num_rows($result1) > 0){
	$sql="DELETE FROM students WHERE id={$student_id} ";

	 if(mysqli_query($conn,$sql)){
	 	echo json_encode(array("message"=> "Student Record Deleted","status"=> TRUE)); 
    }else{
		echo json_encode(array("message"=> "Student Record Can't Deleted","status"=> FALSE));
	}

}else{
	echo json_encode(array("message"=> "Student Record does not exist","status"=> FALSE));
}

?>



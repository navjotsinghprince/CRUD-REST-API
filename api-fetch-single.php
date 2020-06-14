<?php
//protip==use POST method in postman api
//json data hi ayega aur json data format me hi return hoga

header("content-type: application/json");     //return json data

header("Access-Control-Allow-Origin: *");   //koi bhi website aur mobile app access kr skti hai

//{"sid": "1"} suppose manlo is format me data aya hoga
//json format me jo data ayega uske liye

$data=json_decode(file_get_contents("php://input"),TRUE); //true pass kregy toh json decode() associative array return krta hai
#php://input ===ye agr request mobileAPP ya desktopApp ya WebApp se ayi hai jo bhi raw data ayega usko read krega chae kon se bi format se ho json ho ya xml

$student_id=$data['sid'];

include "config.php";

$sql="SELECT * FROM students WHERE id= {$student_id}";

$result=mysqli_query($conn,$sql) or die("SQL Query Failed");

if(mysqli_num_rows($result) > 0){
  $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
  echo json_encode($output);
}else{
  echo json_encode(array("message"=> "No Records Found","status"=> FALSE));
}

?>

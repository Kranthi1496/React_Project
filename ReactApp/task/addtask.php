<?php require '../config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data=json_decode(file_get_contents("php://input"));

$user_id    = $data->user_id;
$task_title = $data->task_title;
$task_desc  = $data->task_desc;
$start_date = $data->start_date;
$end_date   = $data->end_date;
$status     = $data->status;
$timestamp  ='ADDED';

if($user_id !='' && $task_title !='' && $task_desc!='' && $start_date!='' && $end_date!='' && $status!='' && $timestamp!=''){
$usql = "INSERT INTO task (user_id,task_title,task_desc,start_date,end_date,status,timestamp) 
VALUES   ('$user_id','$task_title','$task_desc','$start_date','$end_date','$status','$timestamp')";
                         
                       


$uresult = $conn->query($usql);



 echo'{"status": "OK"}';


}
$conn->close();
?>

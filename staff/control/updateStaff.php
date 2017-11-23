<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['level']) && isset($_POST['status']) && isset($_POST['id']) );

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
    $name = mysqli_real_escape_string($con,$_POST['name'] );
    $email = mysqli_real_escape_string($con,$_POST['email'] );
    $level = $_POST['level'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    
    $query = "Update user set name='$name', email='$email', user_level=$level, status='$status' where id=$id ;";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Staff information is updated.";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>


<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['level']) && isset($_POST['status']) );

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
    $name = mysqli_real_escape_string($con,$_POST['name'] );
    $email = mysqli_real_escape_string($con,$_POST['email'] );
    $level = $_POST['level'];
    $status = $_POST['status'];
    $pwd = mysqli_real_escape_string($con, md5("abc123"));
    
    $query = "Insert into user(name, email, password, user_level, status) "
            . "Values('$name', '$email', '$pwd', $level, '$status');";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Success adding new staff";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>


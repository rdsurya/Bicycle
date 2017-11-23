<?php
session_start();
require '../../class/connect2.php';

$email = $_SESSION['email'];

$cPwd = md5($_POST['cPwd']) ;
$nPwd = $_POST['nPwd'];

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

$cPwd = mysqli_real_escape_string($con, $cPwd);
$sql="Select id from user where email='$email' AND password='$cPwd'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) == 1){
    $nPwd = mysqli_real_escape_string($con, md5($nPwd));
    $sql="Update user set password='$nPwd' where email='$email'";
    if(mysqli_query($con, $sql)){
        $reply->valid=true;
        $reply->msg="Password is changed. Please login again!";
    }
    else{
        $reply->valid=false;
        $reply->msg="Error: ".  mysqli_error($con);
    }
}
else{
    $reply->valid=false;
    $reply->msg="Your current password is wrong";
}

echo json_encode($reply);
mysqli_close($con);

?>


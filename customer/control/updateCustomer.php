<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['matric']) && isset($_POST['phone']) && isset($_POST['id']));

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invali input";

if($isComplete){
    
    $name = mysqli_real_escape_string($con,$_POST['name'] );
    $email = mysqli_real_escape_string($con,$_POST['email'] );
    $address = mysqli_real_escape_string($con,$_POST['address'] );
    $phone = $_POST['phone'];
    $matric = $_POST['matric'];
    $id = $_POST['id'];
    
    $query = "Update customer set name='$name', email='$email', address='$address', phone='$phone', matric='$matric' where matric='$id' ;";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Customer information is updated.";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>


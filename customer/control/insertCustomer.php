<?php
session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['matric']) && isset($_POST['phone']));

$reply = new stdClass();
$reply->valid=false;
$reply->msg="Invalid input";

if($isComplete){
    
    $name = mysqli_real_escape_string($con,$_POST['name'] );
    $email = mysqli_real_escape_string($con,$_POST['email'] );
    $address = mysqli_real_escape_string($con,$_POST['address'] );
    $phone = $_POST['phone'];
    $matric = $_POST['matric'];
        
    $query = "Insert into customer(name, email, phone, address, matric) "
            . "Values('$name', '$email', '$phone', '$address', '$matric');";
    
    if(mysqli_query($con, $query)){
        $reply->valid=true;
        $reply->msg="Success adding new customer";
    }
    else{
        $reply->valid=false;
        $reply->msg= mysqli_error($con);
    }
    
}

echo json_encode($reply);
mysqli_close($con);

?>


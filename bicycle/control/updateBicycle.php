<?php

session_start();
require '../../class/connect2.php';

$isComplete = ( isset($_POST['bicycleID']) && isset($_POST['type']) && isset($_POST['model']) && isset($_POST['status']));

$reply = new stdClass();
$reply->valid = false;
$reply->msg = "Invali input";

if ($isComplete) {

    $bicycleID = mysqli_real_escape_string($con, $_POST['bicycleID']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $model = mysqli_real_escape_string($con, $_POST['model']);
    $stat = $_POST['status'];
    $id = $_POST['id'];

    $query = "Update bicycle set type='$type', model='$model', status='$stat', bicycleID='$bicycleID' where bicycleID='$id' ;";

    if (mysqli_query($con, $query)) {
        $reply->valid = true;
        $reply->msg = "Bicycle information is updated.";
    } else {
        $reply->valid = false;
        $reply->msg = mysqli_error($con);
    }
}

echo json_encode($reply);
mysqli_close($con);
?>


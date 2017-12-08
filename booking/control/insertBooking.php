<?php

require '../../class/connect2.php';

$isComplete = ( isset($_POST['customer']) && isset($_POST['bicycle']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['package']) && isset($_POST['price']));

$reply = new stdClass();
$reply->valid = false;
$reply->msg = "Invalid input";

if ($isComplete) {
    $strDate = date("YmdHis");
    $strLastTwo = mt_rand(10, 99);
    $bookNo = $strDate . $strLastTwo;

    $customerNo = $_POST['customer'];
    $bicycleID = $_POST['bicycle'];
    $startTime = $_POST['startDate'];
    $endTime = $_POST['endDate'];
    $package = $_POST['package'];
    $price = $_POST['price'];

    $query = "Select bike.`bicycleID` "
            . "FROM bicycle bike "
            . "JOIN booking  book on book.bicycle_no=bike.`bicycleID` "
            . "WHERE bike.`bicycleID`='$bicycleID' AND ( (book.startDate between '$startTime' AND '$endTime') OR (book.endDate between '$startTime' AND '$endTime') "
            . "OR ('$startTime' between book.startDate and book.endDate) OR ('$endTime' between book.startDate and book.endDate) );";

    $bikeAvailable = mysqli_query($con, $query);
    
    if (mysqli_num_rows($bikeAvailable) > 0) {
        $reply->valid = false;
        $reply->msg = "Our bicycle $bicycleID is not available from $startTime to $endTime. Please choose other bicycle or select different time.";
    } else {
        $query = "Insert into booking(booking_no, bicycle_no, customer_no, `startDate`, `endDate`, price, status) "
                . "VALUES('$bookNo', '$bicycleID', '$customerNo', '$startTime','$endTime', $price, 'New' );";
        if (mysqli_query($con, $query)) {
            $reply->valid = true;
            $reply->msg = "Our worker $bicycleID is successfully booked for our customer $customerNo. The booking number is $bookNo.";
        } else {
            $reply->valid = false;
            $reply->msg = "Error: " . mysqli_error($con);
        }
    }
}
echo json_encode($reply);
mysqli_close($con);
?>
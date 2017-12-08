<?php
require '../../class/connect2.php';

$sql="Select bicycleID as value, model as name from bicycle where status='Available';";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0){
    
    $item = array();
    while($row = mysqli_fetch_object($result)){
        array_push($item, $row);
    }
    echo json_encode($item);
}
mysqli_close($con);
?>

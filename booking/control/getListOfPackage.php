<?php
require '../../class/connect2.php';

$query = "Select pack_cd, name, price, days from package where status='Active'"; 
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_object($result)){
?>
<option value='<?=  json_encode($row)?>'><?= $row->name?></option>
<?php
}// end loop

mysqli_close($con);

?>


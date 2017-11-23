<?php

session_start();

require '../../class/connect2.php';

// username and password sent from form 
$email = $_POST['email'];
$password = md5($_POST['password']);


// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM user WHERE email='$email' and password='$password'";
$res = mysqli_query($con, $sql);


// Mysql_num_row is counting table row
$count = mysqli_num_rows($res);
// If result matched $myusername and $mypassword, table row must be 1 row


if ($count == 1) {
    $result = mysqli_fetch_array($res);
    $email = $result['email'];
    $name = $result['name'];
    $level = $result['user_level'];
    $status = $result['status'];


    // Set up session begin!
    $_SESSION["email"] = $email;
    $_SESSION["name"] = $name;
    $_SESSION["password"] = $password;
    $_SESSION["user_level"] = $level;
    $_SESSION["status"] = $status;

    if ($level == '0' && $status == 'active') {
        $_SESSION['isAdmin'] = true;
        header("location: ../home.php");
    } elseif ($level == NULL) {
        $_SESSION['isFarmer'] = true;
        header("location: index_login.php");
    } elseif ($role == 'officer') {
        $_SESSION['isOfficer'] = true;
        header("location: officer.php");
    }
} elseif ($count == 0) {
    echo "<meta http-equiv=\"refresh\"content=\"2;URL=../login.php\">";
    echo "Login Failed";
    session_unset();
    
}
?>
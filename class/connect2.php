<?php
        $usernm="root";
        $passwd="";
        $host="localhost";
        $database="fahmi";

        $con = mysqli_connect($host,$usernm,$passwd, $database) or die(mysql_error("Failed"));

?>
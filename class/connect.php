<?php
        $usernm="root";
        $passwd="12345678";
        $host="localhost";
        $database="fahmi";

        mysql_connect($host,$usernm,$passwd) or die(mysql_error("Failed"));

        mysql_select_db($database) or die('Error querying database.');

?>
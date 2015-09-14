<?php
	    include("sql.php");
	    session_start();
	 
	    function Destroy() {
	        unset($_SESSION['UID']);
	        unset($_SESSION['USERNAME']);
	        header("location: login.php");
	    }
	 
	    if(isset($_SESSION['UID']) && isset($_SESSION['USERNAME'])) {
	        $UID = $_SESSION['UID'];
	        $username = $_SESSION['USERNAME'];
	        $qry = mysql_query("SELECT * FROM `users` WHERE `UID` = '$UID' AND `Username` = '$username'");
	        if(mysql_num_rows($qry) != 1) { Destroy(); }
	    } else { Destroy(); }
?>
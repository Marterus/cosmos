<?php
	    //sql.php
	    $server = "localhost"; 
	    $user = "c5it"; 
	    $pass = "12061974";
	 
	    $conn = mysql_connect($server, $user, $pass);
	    $db = mysql_select_db("c5onetask", $conn);
		mysql_set_charset('utf8',$conn);	 
	    if(!$db) { 
	        echo "Извините ошибка :(/>";
	        exit(); 
	    }
?>
	<?php
	    include("sql.php"); //соединение с SQL
	 
	    session_start(); //начало сессии для записи
	 
	    function Fix($str) { //очистка полей
	        $str = trim($str);
	        if(get_magic_quotes_gpc()) {
	            $str = stripslashes($str);
	        }
	        return mysql_real_escape_string($str);
	    }
	 
	    $errmsg = array(); //массив для сохранения ошибок
	     
	    $errflag = false; //флаг ошибки
	 
	    $username = Fix($_POST['username']);//имя пользователя
	    $password = Fix($_POST['password']);//пароль
	 
	    //проверка имени пользователя
	    if($username == '') {
	        $errmsg[] = 'Username missing'; //ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка пароля
	    if($password == '') {
	        $errmsg[] = 'Password missing'; //ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	 
	    //если флаг ошибки поднят, направляет обратно к форме регистрации
	    if($errflag) {
	        $_SESSION['ERRMSG'] = $errmsg; //записывает ошибки
	        session_write_close(); //закрытие сессии
	        header("location: login.php"); //перенаправление
	        exit();
	    }
	 
	    //запрос к базе данных
	    $qry = "SELECT * FROM `users` WHERE `Username` = '$username' AND `Password` = '" . md5($password) . "'";
	    $result = mysql_query($qry);
	     
	    //проверка, был ли запрос успешным (есть ли данные по нему)
	    if(mysql_num_rows($result) == 1) {
	        while($row = mysql_fetch_assoc($result)) {
	            $_SESSION['UID'] = $row['UID'];//получение UID из базы данных и помещение его в сессию
	            $_SESSION['USERNAME'] = $username;//устанавливает, совпадает ли имя пользователя с сессионным 
	            session_write_close(); //закрытие сессии
	            header("location: index.php");//перенаправление
	        }
	    } else {
	        $_SESSION['ERRMSG'] = "Invalid username or password"; //ошибка
	        session_write_close(); //закрытие сессии
	        header("location: login.php"); //перенаправление
	        exit(); 
	    }
	?>
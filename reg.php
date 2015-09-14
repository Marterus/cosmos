<?php
	    //reg.php
	    include("sql.php"); //соединение с SQL
	 
	    session_start(); //начало сессии для записи
	 
	    function Fix($str) { //очистка полей
	        $str = @trim($str);
	        if(get_magic_quotes_gpc()) {
	            $str = stripslashes($str);
	        }
	        return mysql_real_escape_string($str);
	    }
	 
	    $errmsg = array(); //массив для хранения ошибок 
	     
	    $errflag = false; //флаг ошибки
	 
		$UID = uniqid("");//уникальный ID
	    $username = Fix($_POST['username']);//имя пользователя
	    $email = $_POST['email']; //Email
	    $password = Fix($_POST['password']);//пароль
	    $rpassword = Fix($_POST['rpassword']);//повтор пароля
	 
	    //проверка имени пользователя
	    if($username == '') {
	        $errmsg[] = 'Username missing'; //ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка Email
	    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) { //должен соответствовать формату: me@hi.com
	        $errmsg[] = 'Invalid Email'; //ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка пароля
	    if($password == '') {
	        $errmsg[] = 'Password missing'; //ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка повтора пароля
	    if($rpassword == '') {
	        $errmsg[] = 'Repeated password missing';//ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка валидности пароля
	    if(strcmp($password, $rpassword) != 0 ) {
	        $errmsg[] = 'Passwords do not match';//ошибка
	        $errflag = true; //поднимает флаг в случае ошибки
	    }
	 
	    //проверка, свободно ли имя пользователя
	    if($username != '') {
	        $qry = "SELECT * FROM `users` WHERE `Username` = '$username'"; //запрос к MySQL
	        $result = mysql_query($qry);
	        if($result) {
	            if(mysql_num_rows($result) > 0) {//если имя уже используется
	                $errmsg[] = 'Username already in use'; //сообщение об ошибке
	                $errflag = true; //поднимает флаг в случае ошибки
	            }
	            mysql_free_result($result);
	        }
	    }
	 
	    //если данные не прошли валидацию, направляет обратно к форме регистрации
	    if($errflag) {
	        $_SESSION['ERRMSG'] = $errmsg; //сообщение об ошибке
	        session_write_close(); //закрытие сессии
	        header("location: register.php");//перенаправление
	        exit();
	    }
	 
	    //добавление данных в базу
	    $qry = "INSERT INTO `c5onetask`.`users`(`UID`, `Username`, `Email`, `Password`) VALUES('$UID','$username','$email','" . md5($password) . "')";
	    $result = mysql_query($qry);
		
		//добавляем данные о персонаже
		$qry2 = "INSERT INTO `user_info`(`UID`, `var_name`, `var_value`) VALUES('$UID','location','Terra')";
	    $result2 = mysql_query($qry2); 
		 
	    //проверка, был ли успешным запрос на добавление
	    if($result) {
			
			//добавляем данные о персонаже
			$qry2 = "INSERT INTO `user_info`(`UID`, `var_name`, `var_value`) VALUES('$UID','location','Terra')";
			$result2 = mysql_query($qry2); 
	        
			echo "Благодарим Вас за регистрацию, " .$username . ". Пожалуйста, входите <a href=\"login.php\">сюда</a>";
	        exit();
	    } else {
	        die("Ошибка, обратитесь позже");
	    }
	?>

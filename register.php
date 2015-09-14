<?php
	    //register.php
	    session_start(); //начало сессии
	    if(isset($_SESSION['ERRMSG']) &&is_array($_SESSION['ERRMSG']) &&count($_SESSION['ERRMSG']) >0 ) { //если есть ошибки сессии
	        $err = "<table>"; //начало таблицы                                 
	        foreach($_SESSION['ERRMSG'] as $msg) {//устанавливает каждую ошибку
	            $err .= "<tr><td>" . $msg . "</td></tr>"; //записывает их в переменную
	        }
	        $err .= "</table>"; //конец таблицы
	        unset($_SESSION['ERRMSG']); //уничтожает сессию
	    }
	?>
	<html>
	    <head>
	        <title>Форма регистрации</title>
	    </head>
	    <body>
	        <form action='reg.php' method='post'>
	            <table align="center">
	                <tr>
	                    <td><?php echo $err; ?></td>
	                </tr>
	                <tr>
	                    <td>Имя пользователя</td>
	                    <td><input type='text' name='username'></td>
	                </tr>
	                <tr>
	                    <td>E-mail</td>
	                    <td><input type='text' name='email'></td>
	                </tr>
	                <tr>
	                    <td>Пароль</td>
	                    <td><input type='password' name='password'></td>
	                </tr>
	                <tr>
	                    <td>Повтор пароля</td>
	                    <td><input type='password' name='rpassword'></td>
	                </tr>
	                <tr>
	                    <td><input type='submit' value='Зарегистрировать'></td>
	                    <td><a href="login.php">У меня есть аккаунт</a></td>
	                </tr>
	            </table>
	        </form>
	    </body>
	</html>
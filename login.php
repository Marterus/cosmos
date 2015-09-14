<?php
	    //login.php
	    session_start(); //начало сессии
	    if(isset($_SESSION['ERRMSG']) &&is_array($_SESSION['ERRMSG']) &&count($_SESSION['ERRMSG']) >0 ) { //если есть ошибки сессии
	        $err = "<table>"; //Start a table
	        foreach($_SESSION['ERRMSG'] as $msg) {//распознавание каждой ошибки
	            $err .= "<tr><td>" . $msg . "</td></tr>"; //запись её в переменную
	        }
	        $err .= "</table>"; //закрытие таблицы
	        unset($_SESSION['ERRMSG']); //удаление сессии
	    }
	?>
	<html>
	    <head>
	        <title>Форма входа</title>
	    </head>
	    <body>
	        <form action='log.php' method='post'>
	            <table align="center">
	                <tr>
	                    <td><?php echo $err; ?></td>
	                </tr>
	                <tr>
	                    <td>Имя пользователя</td>
	                    <td><input type='text' name='username'></td>
	                </tr>
	                <tr>
	                    <td>Пароль</td>
	                    <td><input type='password'name='password'></td>
	                </tr>
	                <tr>
	                    <td><input type='submit'value='Войти'></td>
	                    <td><a href="register.php">Регистрация</a></td>
	                </tr>
	            </table>
	        </form>
	    </body>
	</html>
	
	
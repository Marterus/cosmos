<!DOCTYPE html>
<html>
	<meta charset="utf-8">
    <title>Cosmos</title>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="/js/func.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
<?php include("auth.php"); include("lib.php");?>

<div class=header> -=Cosmos=- Добро пожаловать! <a href="logout.php">Выйти</a>  <a href="menu.php">Test Game</a><br/></div>
<div class=left>
	<div class=logo><?php echo $_SESSION['USERNAME']; ?></div>
	<div class=manager>
		<br/><input type=button value="Персонаж" onclick="javascript:viewPerson()">
		<br/><input type=button value="Карта космоса" onclick="javascript:viewSolarSystem()">
		<br/><input type=button value="Планета" onclick="javascript:viewPlanet()">
		<br/><input type=button value="Test" onclick="javascript:viewScreen()">
	</div>
</div>

<div class=center name="center">
	<div class=title name="title">Название</div>
	<div class=screen name="screen">Главный экран</div>
</div>

<div class=right>
	<div class=info name="info">Инфо</div>
	<div class=comunicator>Комуникатор</div>
</div>

<div class=ticker>Бегущая строка</div>
<div class=footer>Все права защищены © 2015 Игорь Забуга. Cosmos</div>

<?php
//$array = array('1' => 'a', '2' => 'b');
 
//foreach($array as $key => $value)
//{
//echo "INSERT INTO En_Cloaks (key, value) values ('".$key."', '".$value."')";
//}
?>

</body>
</html>
<?php

include("auth.php");

echo "<h3>Cosmos Game</h3><br/>";
echo "Добро пожаловать, ".$_SESSION['USERNAME']."! <a href='logout.php'>Выйти</a><br/>";
echo "<a href='heroes.php'>Персонаж</a>"."<br/>";
echo "<a href='station.php'>Станция</a>"."<br/>";
echo "<a href='map.php'>Карта</a>"."<br/>";


?>
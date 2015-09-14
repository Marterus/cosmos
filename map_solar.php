<?php

include("auth.php");
include "connectdb.php";

$solar_system = $_GET['solar_system'];

$query = "SELECT * FROM `solar_system` WHERE `id`='".$solar_system."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);

echo "<h3>Карта солнечной системы ".$row['solar']." </h3>";
echo "<a href='menu.php'>На главную</a><br>";
echo "<a href='map_star.php?star_system=".$row['id_star_system']."'>К выбору солнечных систем</a><br>";

echo "<form action='map_planet.php' method='get'>";
$query = "SELECT * FROM `planet` WHERE `id_solar_system`='".$solar_system."'";
$res = mysql_query($query, $conn);
while ($row = mysql_fetch_assoc($res)){
	echo "<input type='radio' name='planet' value='".$row['id']."'>".$row['name']."<Br>";
}
echo "<input type='submit' value='К планете'></input></form>";
?>
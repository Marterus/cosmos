<?php
include("auth.php");
include "connectdb.php";
echo '<!DOCTYPE html><html><meta charset="utf-8"><title>Cosmos</title><body>';

$planet = $_GET['planet'];

$query = "SELECT * FROM `planet` WHERE `id`='".$planet."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);

echo "<h3>Информация о планете ".$row['name']." </h3>";
echo "<a href='menu.php'>На главную</a><br>";
echo "<a href='map_solar.php?solar_system=".$row['id_solar_system']."'>К выбору солнечных систем</a><br>";

$query = "SELECT * FROM `planet_info` WHERE `id_planet`='".$planet."'";
$res = mysql_query($query, $conn);
while ($row = mysql_fetch_assoc($res)){
	echo $row['variable']." - ".$row['value']."<Br>";
}


echo "<form action='to_fly.php'>";
echo "<input style='visibility:hidden' type='text' name='planet' size='40' value='".$planet."'><br>";
echo "<input type='submit' value='Лететь' />";
echo "</form>";
echo "</body></html>";
?>
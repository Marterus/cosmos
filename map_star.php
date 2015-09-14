<?php

include("auth.php");
include "connectdb.php";

$star_system = $_GET['star_system'];

$query = "SELECT * FROM `star_system` WHERE `id`='".$star_system."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);

echo "<h3>Карта звездной системы ".$row['name']." </h3>";
echo "<a href='menu.php'>На главную</a><br>";
echo "<a href='map.php'>К выбору звездных систем</a><br>";

echo "<form action='map_solar.php' method='get'>";
$query = "SELECT * FROM `solar_system` WHERE `id_star_system`='".$star_system."'";
$res = mysql_query($query, $conn);
while ($row = mysql_fetch_assoc($res)){
	echo "<input type='radio' name='solar_system' value='".$row['id']."'>".$row['solar']."<Br>";
}
echo "<input type='submit' value='К солнечной системе'></input></form>";

?>
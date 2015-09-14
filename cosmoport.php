<?php

include("auth.php");
include "connectdb.php";

$query = "SELECT * FROM `user_info` WHERE `uid`='".$_SESSION['UID']."' AND `var_name`='location'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);
$planet = $row['var_value'];
$query = "SELECT * FROM `planet` WHERE `id`='".$planet."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);
$planet_name = $row['name'];

echo "<h3>Станция на орбите планеты ".$planet_name."</h3>";
echo "<a href='menu.php'>На главную</a><br>";

echo "<a href='menu.php'>Биржа труда</a><br>";
echo "<a href='menu.php'>Колледж</a><br>";
echo "<a href='menu.php'>Торговля</a><br>";
echo "<a href='menu.php'>Космодром</a><br>";
echo "<a href='menu.php'>Банк</a>";


?>
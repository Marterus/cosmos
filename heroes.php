<?php

include("auth.php");
include "connectdb.php";

echo "<h3>О игроке ".$_SESSION['USERNAME']."</h3>";
echo "<a href='menu.php'>На главную</a>";


$query = "SELECT * FROM `user_info` WHERE `uid`='".$_SESSION['UID']."' AND `var_name`='location'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);
$planet = $row['var_value'];
$query = "SELECT * FROM `planet` WHERE `id`='".$planet."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);
$planet_name = $row['name'];

echo "<br>Находится на орбите планеты ".$planet_name;


?>
<?php

include("auth.php");
include "connectdb.php";





$planet = $_GET['planet'];
$query = "SELECT * FROM `planet` WHERE `id`='".$planet."'";
$res = mysql_query($query, $conn);
$row = mysql_fetch_assoc($res);

$query = "UPDATE `user_info` SET `var_value`=".$planet." WHERE `uid`='".$_SESSION['UID']."' AND `var_name`='location'";
$res = mysql_query($query, $conn);

echo "<h3>Перелет к планете ".$row['name']." осуществлен успешно!</h3>";
echo "<a href='menu.php'>На главную</a><br>";



?>
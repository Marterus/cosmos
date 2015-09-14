<?php

include("auth.php");
include "connectdb.php";

echo "<h3>Карта доступной вселенной</h3>";
echo "<a href='menu.php'>На главную</a><br>";
$query="SELECT * FROM `star_system`";
$res=mysql_query($query,$conn);

echo "<form method='get' action='map_star.php'>";
while ($row=mysql_fetch_assoc($res)){
	echo "<input type='radio' name='star_system' value=".$row['id'].">".$row['name']."<Br>";
}
echo "<input type='submit' value='К звездной системе'></input></form>";

?>
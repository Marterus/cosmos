<?php
 

 
//# include data base
include "sql.php";
include "lib.php";
//include "auth.php";
 	    session_start();
 
switch ($_POST['action']):

    case "viewSolarSystem":
		
		$ret=BaseToArray("Ketar",3);
		echo '<div class=title name="title"><br/><h1>'.$ret[title].'</h1></div>';
		echo '<div class=screen name="screen">';
		foreach ($ret[0] as $list){
			echo '<br/>'.$list;
		}
		break;
                
    case "viewPerson":
		echo '<div class=title name="title">О персонаже</div>';
		echo '<div class=screen name="screen">';
		$query="SELECT * FROM `user_info` WHERE `uid`='".$_SESSION['UID']."'";
		$res=mysql_query($query, $conn);
		while ($row = mysql_fetch_assoc ($res)){
			echo "<br/>".$row[var_name];
		}

		echo "</div>";
 		break;

    case "viewPlanet":
		$ret=BaseToArray("Magelan",2);
		echo '<div class=title name="title"><br/><h1>'.$ret[title].'</h1></div>';
		echo '<div class=screen name="screen">';
		foreach ($ret[0] as $list){
			echo '<br/>'.$list;
		}
		echo '</div>';
	
 		break;	
		
    case "viewScreen":
		$ss = $_POST['val_check'];
		echo $ss[0];
		$ret=BaseToArray($ss[0],1);
		global $_check_system;
		echo $_check_system = 2;
		echo '<div class=title name="title"><br/><h1>'.$ret[title].'</h1></div>';
		echo '<div class=screen name="screen"><select size="8" multiple name="element" onchange="javascript:viewScreen()">';
		foreach ($ret[0] as $list){
			echo '<option value="'.$list.'">'.$list.'</option>">';
		}
		echo '</select></div>';
	
 		break;	
endswitch;
?>
     




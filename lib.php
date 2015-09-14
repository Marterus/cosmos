<?php


// type_item:
// 1 - Вселенная
// 2 - Галактика
// 3 - Солнечная система
// 4 - Планета

function BaseToArray($parent_item,$type_item){
	include "sql.php";
//	echo $parent_item.' '.$type_item;
	$a=array();
	$ac=array();
	if ($type_item == '1') {
		
		$a = ['title'=>'Вселенная', 'info'=>'Выбери нужную галактику'];
		$query="SELECT * FROM `star_system`";
	 	$rec=mysql_query($query, $conn);
		while ($row = mysql_fetch_assoc($rec)){
			$ac[] = $row['name'];
		}
		$a[]=$ac; 
		
	} else 
	{
	switch ($type_item):
		case "2":
			$query="SELECT * FROM `star_system` WHERE `name`='".$parent_item."'";
			$rec=mysql_query($query, $conn);
			$row = mysql_fetch_assoc($rec);
			$a = ['title'=>$row['name'], 'info'=>$row['note']];
			$id = $row['id'];
			$query="SELECT * FROM `solar_system` WHERE `id_star_system`='".$id."'";
			$rec=mysql_query($query,$conn);
			while ($row = mysql_fetch_assoc($rec)){
				$ac[] = $row['solar'];
			}
			$a[]=$ac;
			
			break;
		case "3":
			$query="SELECT * FROM `solar_system` WHERE `solar`='".$parent_item."'";
			$rec=mysql_query($query, $conn);
			$row = mysql_fetch_assoc($rec);
			$a = ['title'=>$row['solar'], 'info'=>$row['note']];
			$id = $row['id'];
			$query="SELECT * FROM `planet` WHERE `id_solar_system`='".$id."'";
			$rec=mysql_query($query,$conn);
			while ($row = mysql_fetch_assoc($rec)){
				$ac[] = $row['name'];
			}
			$a[]=$ac;
			
			break;
		case "4":
			$parent_table='planet';
			$child_table='';
			
			break;
	endswitch;
	

	}  
	//print_r($a);
	
	return $a;
}


//$ret=BaseToArray("Orion",1);


?>
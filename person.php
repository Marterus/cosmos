<?php 

//Базовые параметры персонажа при создании

$base_param = array(
	"avatar"=>"start_avatar.jpg",
	"location"=>"1",
	"sex"=>"men",
	"money"=>"1",
	
	"skill"=>array("harism"=>"10"), // Врожденне навыки
	"ability"=>array(   // Профессиональные умения персонажа
		"pilot"=>"10", 
		"traider"=>"10", 
		"worker"=>"10"
	), 
	"inventory"=>array(  // Инветнарь
		"kredit card"=>"Space Union Bank",
		"cloth"=>"coveralls",
		"comunicator"=>"Vegas Comm GiperG"
	), 
	"quest"=>array("start") //Задания
);

?>
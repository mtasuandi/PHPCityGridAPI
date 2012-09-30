<?php
require_once('citygrid_api_class.php');

$obj = new CityGridAPI();

try{
	
	$result = $obj->getPlacesWhere('movietheater','','90045','test');
}catch(Exception $e){
	
	echo $e->getMessage();
}

var_dump($result);
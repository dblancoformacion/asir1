<?php // Vamos a realizar las consultas del entrenador en php

$conn = new mysqli('localhost','root','','provincias');
$conn->query("SET NAMES utf8;");

$provincias=$conn->query("
	SELECT * FROM provincias;
")->fetch_all(MYSQLI_ASSOC);

if(0){
	echo '<pre>';
	print_r($provincias);
	echo '</pre>';
}

if(1){ // provincias de Galicia
	foreach($provincias as $p){
		if($p['autonomia']=='Galicia'){
			echo $p['provincia'];
			echo '<br/>';
		}
	}
}
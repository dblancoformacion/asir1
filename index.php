<?php // Vamos a realizar las consultas del entrenador en php
if(1){	// conexión a la base de datos
	$conn = new mysqli('localhost','root','','provincias');
	$conn->query("SET NAMES utf8;");

	$provincias=$conn->query("
		SELECT * FROM provincias;
	")->fetch_all(MYSQLI_ASSOC);
}
if(0){	// tabla completa
	echo '<pre>';
	print_r($provincias);
	echo '</pre>';
}
if(0){	// (01) Listado de provincias
	$i=0;
	foreach($provincias as $p)
		echo ++$i.'. '.$p['provincia'].'<br/>';
}
if(0){	// (02) ¿Cuánto suman 2 y 3?
	echo 2+3;
}
if(0){	// (04) Densidades de población de las provincias
	foreach($provincias as $p){
		echo $p['provincia'].' ';
		echo str_replace('.',',',round($p['poblacion']/$p['superficie'],4));
		echo '<br/>';
	}
}
if(0){	// (52) Obtén el listado del nombre de las provincias que tiene cada autonomía
	foreach($provincias as $p){
		echo $p['autonomia'];
		echo ' ';
		echo $p['provincia'];
		echo '<br/>';
	}
}
if(0){	// (03) ¿Cuánto vale la raíz cuadrada de 2?
	echo str_replace('.',',',sqrt(2));
}
if(0){ 	// (05) ¿Cuántos caracteres tiene cada nombre de provincia?
	foreach($provincias as $p){
		echo $p['provincia'].' ';
		echo strlen($p['provincia']).'<br/>';
	}
}
if(0){	// (07) Provincias con el mismo nombre que su comunidad autónoma
	foreach($provincias as $p)
		if($p['provincia']==$p['autonomia'])
			echo $p['provincia'].'<br/>';
}
if(0){	// (08) Provincias que contienen el diptongo 'ue'
	foreach($provincias as $p)
		if(strstr($p['provincia'],'ue'))
			echo $p['provincia'].'<br/>';
}
if(0){	// (09) Provincias que empiezan por A
	foreach($provincias as $p)
		if($p['provincia'][0]=='A')
			echo $p['provincia'].'<br/>';
}
if(0){	// (17) ¿Qué provincias están en autonomías con nombre compuesto?
	foreach($provincias as $p)
		if(strstr($p['autonomia'],' '))
			echo $p['provincia'].'<br/>';
}
if(0){	// (18) ¿Qué provincias tienen nombre compuesto?
	foreach($provincias as $p)
		if(strstr($p['provincia'],' '))
			echo $p['provincia'].'<br/>';
}
if(0){	// (19) ¿Qué provincias tienen nombre simple?
	foreach($provincias as $p)
		if(!strstr($p['provincia'],' '))
			echo $p['provincia'].'<br/>';
}
if(0){	// (51) Muestra las provincias de Galicia, indicando si es Grande, Mediana o Pequeña en función de si su población supera el umbral de un millón o de medio millón de habitantes.
	foreach($provincias as $p)
		if($p['autonomia']=='Galicia'){
			$r='Pequeña';
			if($p['poblacion']>5e5) $r='Mediana';
			if($p['poblacion']>1e6) $r='Grande';
			echo $p['provincia'].' '.$r.'<br/>';
		}
}
if(0){	// (10) Autonomías terminadas en 'ana'
	foreach($provincias as $p){
		strlen(strstr(strrev($p['autonomia']),'ana'));
		if(strlen(strstr(strrev($p['autonomia']),'ana'))>0)
			echo $p['autonomia'].'<br/>';
	}
}
if(1){	// (11) ¿Cuántos caracteres tiene cada nombre de comunidad autónoma? Ordena el resultado por el nombre de la autonomía de forma descendente
	foreach($provincias as $p){
		$a=$p['autonomia'];
		$as[$a]=iconv_strlen($a);
	}
	arsort($as);
	foreach($as as $autonomia=>$longitud)
		echo $autonomia.' '.$longitud.'<br/>';
}
if(0){	// (06) Listado de autonomías
	foreach($provincias as $p)
		$autonomias[]=$p['autonomia'];
	$autonomias=array_unique($autonomias);
	echo '<ol>';
	foreach($autonomias as $autonomia)
		echo '<li>'.$autonomia.'</li>';
	echo '</ol>';
}
if(0){ 	// provincias de Galicia
	foreach($provincias as $p){
		if($p['autonomia']=='Galicia'){
			echo $p['provincia'];
			echo '<br/>';
		}
	}
}
<?php // Vamos a realizar las consultas del entrenador en php
if(1){	// conexión a la base de datos y generación del array $provincias
	$conn = new mysqli('localhost','root','','provincias');
	$conn->query("SET NAMES utf8;");
	$provincias=$conn->query("
		SELECT * FROM provincias;
	")->fetch_all(MYSQLI_ASSOC);
}
if(0){	// tabla provincias completa
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
if(0){	// (11) ¿Cuántos caracteres tiene cada nombre de comunidad autónoma? Ordena el resultado por el nombre de la autonomía de forma descendente
	foreach($provincias as $p){
		$a=$p['autonomia'];
		$as[$a]=iconv_strlen($a);
	}
	arsort($as);
	foreach($as as $autonomia=>$longitud)
		echo $autonomia.' '.$longitud.'<br/>';
}
if(0){	// (12) ¿Qué autonomías tienen nombre compuesto? Ordena el resultado alfabéticamente en orden inverso
	foreach($provincias as $p)
		$autonomias[$p['autonomia']]=1;
	foreach($autonomias as $a=>$i)
		if(strstr($a,' '))
			$as[]=$a;
	rsort($as);
	foreach($as as $a)
		echo $a.'<br/>';
}
if(0){	// (13) ¿Qué autonomías tienen nombre simple? Ordena el resultado alfabéticamente en orden inverso
	foreach($provincias as $p)
		$autonomias[$p['autonomia']]=1;
	foreach($autonomias as $a=>$i)
		if(!strstr($a,' '))
			$as[]=$a;
	rsort($as);
	foreach($as as $a)
		echo $a.'<br/>';
}
if(0){	// (14) ¿Qué autonomías tienen provincias con nombre compuesto? Ordenar el resultado alfabéticamente
	foreach($provincias as $p)
		if(strstr($p['provincia'],' '))
			$pc[]=$p;
	foreach($pc as $p)
		$as[$p['autonomia']]=$p['autonomia'];
	sort($as);
	foreach($as as $a)
		echo $a.'<br/>';
}
if(0){	// (15) Autonomías que comiencen por 'can' ordenadas alfabéticamente
	foreach($provincias as $p)
		if(strstr($p['autonomia'],'Can'))
			$as[$p['autonomia']]=$p['autonomia'];
	sort($as);
	foreach($as as $a)
		echo $a.'<br/>';
}
if(0){	// (16) ¿Qué autonomías tienen provincias de más de un millón de habitantes? Ordénalas alfabéticamente
	foreach($provincias as $p)
		if($p['poblacion']>1e6)
			$as[$p['autonomia']]=$p['autonomia'];
	sort($as);
	foreach($as as $a)
		echo $a.'<br/>';
}
if(0){	// (21) Población del país
	$h=0;
	foreach($provincias as $p)
		$h+=$p['poblacion'];
	echo $h;
}
if(0){	// (22) Superficie del país
	$s=0;
	foreach($provincias as $p)
		$s+=$p['superficie'];
	echo $s;
}
if(0){	// (23) ¿Cuántas provincias hay en la tabla?
	echo count($provincias);
}
if(0){	// (24) En un listado alfabético, ¿qué provincia estaría la primera?
	foreach($provincias as $p)
		$ps[]=str_replace('Á','A',$p['provincia']);
	sort($ps);
	echo $ps[0];
}
if(0){	// (25) ¿Qué comunidades autónomas contienen el nombre de una de sus provincias?
	foreach($provincias as $p)
		if(strstr($p['autonomia'],$p['provincia']))
			echo $p['autonomia'].'<br/>';
}
if(0){	// (26) ¿Qué provincias tienen un nombre más largo que el de su autonomía?
	foreach($provincias as $p)
		if(iconv_strlen($p['provincia'])>iconv_strlen($p['autonomia']))
			echo $p['provincia'].'<br/>';
}
if(0){	// (27) ¿Cuántas comunidades autónomas hay?
	foreach($provincias as $p)
		$as[$p['autonomia']]=$p['autonomia'];
	echo count($as);

}
if(0){	// (29) ¿Cuánto mide el nombre de autonomía más corto?
	foreach($provincias as $p)
		$as[]=iconv_strlen($p['autonomia']);
	echo min($as);
}
if(0){	// (30) ¿Cuánto mide el nombre de provincia más largo?
	foreach($provincias as $p)
		$as[]=iconv_strlen($p['autonomia']);
	echo max($as);
}
if(0){	// (28) Población media de las provincias entre 2 y 3 millones de habitantes sin decimales
	foreach($provincias as $p)
		if($p['poblacion']>=2e6 and $p['poblacion']<=3e6)
			$pobs[]=$p['poblacion'];
	echo array_sum($pobs)/count($pobs);
}
if(0){	// (53) Obtén el listado de autonomías (una línea por autonomía), junto al listado de sus provincias en una única celda. Recuerda que, tras una coma, debería haber un espacio en blanco.
	foreach($provincias as $p){
		if(!isset($as[$p['autonomia']]))
			$as[$p['autonomia']]=null;
		else $as[$p['autonomia']].=', ';
		$as[$p['autonomia']].=$p['provincia'];
	}
	foreach($as as $a=>$ps)
		echo $a.' '.$ps.'<br/>';
}
if(0){	// (31) Provincia más poblada
	foreach($provincias as $p)
		$pobs[]=$p['poblacion'];
	$m=max($pobs);
	foreach($provincias as $p)
		if($p['poblacion']==$m)
			echo $p['provincia'];
}
if(0){	// (32) Provincia más poblada de las inferiores a 1 millón de habitantes
	unset($pobs);
	foreach($provincias as $p)
		if($p['poblacion']<1e6)
			$pobs[]=$p['poblacion'];
	$m=max($pobs);
	foreach($provincias as $p)
		if($p['poblacion']==$m)
			echo $p['provincia'];
}
if(0){	// (34) Provincia menos poblada de las superiores al millón de habitantes
	unset($pobs);
	foreach($provincias as $p)
		if($p['poblacion']>1e6)
			$pobs[]=$p['poblacion'];
	$m=min($pobs);
	foreach($provincias as $p)
		if($p['poblacion']==$m)
			echo $p['provincia'];
}
if(0){	// (35) ¿En qué autonomía está la provincia más extensa?
	foreach($provincias as $p)
		$sups[]=$p['superficie'];
	$m=max($sups);
	foreach($provincias as $p)
		if($p['superficie']==$m)
			echo $p['autonomia'];
}
if(0){	// (36) ¿Qué provincias tienen una población por encima de la media nacional?
	foreach($provincias as $p)
		$pobs[]=$p['poblacion'];
	$m=array_sum($pobs)/count($pobs);
	foreach($provincias as $p)
		if($p['poblacion']>$m)
			echo $p['provincia'].'<br/>';
}
if(0){	// (37) Densidad de población del país
	$h=0;
	$s=0;
	foreach($provincias as $p){
		$h+=$p['poblacion'];
		$s+=$p['superficie'];
	}
	echo str_replace('.',',',round($h/$s,4));
}
if(0){	// (38) ¿Cuántas provincias tiene cada comunidad autónoma?
	foreach($provincias as $p){
		if(!isset($as[$p['autonomia']]))
			$as[$p['autonomia']]=0;
		$as[$p['autonomia']]++;
	}
	ksort($as);
	foreach($as as $a=>$n)
		echo $a.' '.$n.'<br/>';
}
if(0){	// (39) Listado del número de provincias por autonomía ordenadas de más a menos provincias y por autonomía en caso de coincidir
	foreach($provincias as $p){
		if(!isset($as[$p['autonomia']]))
			$as[$p['autonomia']]=0;
		$as[$p['autonomia']]++;
	}
	arsort($as);
	foreach($as as $a=>$n)
		echo $n.' '.$a.'<br/>';
}
if(0){	// (40) ¿Cuántas provincias con nombre compuesto tiene cada comunidad autónoma?
	foreach($provincias as $p)
		if(strstr($p['provincia'],' '))
			$provs[]=$p;
	foreach($provs as $p){
		if(!isset($as[$p['autonomia']]))
			$as[$p['autonomia']]=0;
		$as[$p['autonomia']]++;
	}
	ksort($as);
	foreach($as as $a=>$n)
		echo $a.' '.$n.'<br/>';
}
if(1){	// (41) Autonomías uniprovinciales
	foreach($provincias as $p){
		if(!isset($as[$p['autonomia']]))
			$as[$p['autonomia']]=0;
		$as[$p['autonomia']]++;
	}
	foreach($as as $a=>$n)
		if($n==1)
			$us[]=$a;
	sort($us);
	foreach($us as $a)
		echo $a.'<br/>';
}
//--------------
if(0){	// Autonomía con el nombre más corto
	foreach($provincias as $p)
		$as[$p['autonomia']]=iconv_strlen($p['autonomia']);
	asort($as);
	foreach($as as $a=>$len){
		echo $a.'<br/>';
		break;
	}
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
<?php

require_once 'figures/class/rectangle.php';
require_once 'figures/class/circle.php';
require_once 'figures/class/triangle.php';

use Figures\Rectangle;
use Figures\Circle;
use Figures\Triangle;

function printArr($arr)
{
    for($i = 0; $i < count($arr); $i++) {
	switch ($arr[$i]['type']) {
	    case "circle":
	        echo "Круг. Рудиус=".$arr[$i]['radius'].". Площадь:\n".$arr[$i]['s']."</br>";
	        break;
	    case "rectangle":
		    echo "Прямоугольник. a=".$arr[$i]['a'].", b=".$arr[$i]['b'].". Площадь:\n".$arr[$i]['s']."</br>";
	        break;
	    case "triangle":
			echo "Треугольник. a=".$arr[$i]['a'].", b=".$arr[$i]['b'].", c=".$arr[$i]['c'].". Площадь:\n".$jsarron[$i]['s']."</br>";
	        break;
	}
}
}

$array = array();

for($i = 0; $i < 10; $i++){
	switch ($i%3) {
		case 0:{
			$array[$i]['type'] = 'circle';
			$array[$i]['radius'] = rand(1,($i+1)*10);
			$figure = new Circle($array[$i]['radius']);
			break;
		}
		case 1:{
			$array[$i]['type'] = 'rectangle';
			$array[$i]['a'] = rand(1,($i+1)*10);
			$array[$i]['b'] = rand(1,($i+1)*10);
		    $figure = new Rectangle($array[$i]['a'], $array[$i]['b']);
		    break;
		}
		case 2:{
			$array[$i]['type'] = 'triangle';
			$array[$i]['a'] = rand(1,($i+1)*10);
			$array[$i]['b'] = rand(1,($i+1)*10);
			$array[$i]['c'] = rand(
				($array[$i]['a'] > $array[$i]['b']) ? $array[$i]['a'] : $array[$i]['a'],
				($array[$i]['a']+$array[$i]['b'] - 1)
			);
	        $figure = new Triangle($array[$i]['a'], $array[$i]['b'], $array[$i]['c']);
		    break;
		}
    }
	$array[$i]['s'] = $figure->Area();
}

printArr($array);
file_put_contents("data.json",json_encode($array));


$path = file_get_contents("figures.json");
$json = json_decode($path, true);

for($i = 0; $i < count($json); $i++) {
	switch ($json[$i]['type']) {
	    case "circle":
	        $figure = new Circle($json[$i]['radius']);
	        break;
	    case "rectangle":
		    $figure = new Rectangle($json[$i]['a'], $json[$i]['b']);
	        break;
	    case "triangle":
	        $figure = new Triangle($json[$i]['a'], $json[$i]['b'], $json[$i]['c']);
	        break;
	}
	$json[$i]['s'] = $figure->Area();
}

usort($json, function($a, $b) {
    if($a['s'] === $b['s'])
        return 0;        
    return $a['s'] > $b['s'] ? -1 : 1;
});

echo "<br />";
printArr($json);
file_put_contents("result.json",json_encode($json));

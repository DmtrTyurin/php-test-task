<?php
$cache = array(0, 1);
echo $cache[0].'<br />'.$cache[1];

for($i = 2; $i <= 64; $i++){
	$cache[$i%2] = $cache[0] + $cache[1];
	echo '<br />'.$cache[$i%2];
}
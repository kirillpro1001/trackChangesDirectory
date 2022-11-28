<?php
	setcookie('countElemDirectory', $countElemDirectory, time()+3600);
	setcookie('arrDirectory', serialize($arrDirectory), time()+3600);
	echo "Новая директория: <br>";

	foreach ($arrDirectory as $value) {
		echo $value."<br>";
	}

	echo "Старая директория: <br> ";
	$getCook = unserialize($_COOKIE['arrDirectory']);
	foreach ($getCook as $value) {
		echo $value."<br>";
	}

?>
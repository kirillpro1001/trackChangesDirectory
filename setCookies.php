<?php
	setcookie('countElemDirectory', $countElemDirectory, time()+3600); //задаем куки с количеством элементов в директории
	setcookie('arrDirectory', serialize($arrDirectory), time()+3600); //задаем куки с массивом файлов в директории, перед этим выполняем сериализацию массива
	echo "Новая директория: <br>"; 

	foreach ($arrDirectory as $value) { //Выводим файлы, хранящиеся в новой директории
		echo $value."<br>";
	}					

	echo "Старая директория: <br> ";
	$getCook = unserialize($_COOKIE['arrDirectory']); 
	foreach ($getCook as $value) { //Выводим файлы, хранящиеся в старой директории
		echo $value."<br>";
	}

?>
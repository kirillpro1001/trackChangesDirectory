<?php 




if (isset($_POST['ftpServer'],$_POST['login'],$_POST['password'],$_POST['ftpDirectory'])) { //Проверяем переданы ли данные в форму

	$ftpServer = $_POST['ftpServer']; //Адрес ftp-сервера
	$ftpLogin = $_POST['login'];  // Логин ftp-сервера
	$ftpPassword = $_POST['password']; //Пароль ftp-сервера
	$ftpDirectory = $_POST['ftpDirectory']; //Проверяемая директория ftp-сервера

	$ftp = ftp_connect($ftpServer) or die("Не удалось установить соединение с $ftpServer"); 

	/* Создаем подключение по адресу ftp-сервера, при этом прекращаем выполнение скрипта в случае ввода ошибочного адреса */



	if(ftp_login($ftp,$ftpLogin,$ftpPassword)) { // Проверяем возможно ли подключиться к ftp по переданому логину и паролю 
		$arrDirectory = ftp_nlist($ftp,$ftpDirectory) or die ("Не удалось найти указанную директорию"); // заносим в массив arrDirectory список всех файлов в директории переданных пользователем
		$countElemDirectory = count($arrDirectory); // Задаем счетчик количества файлов в директории
		if (!isset($_COOKIE['countElemDirectory'])) { //Проверяем существует ли куки с числом элементов в директории
			setcookie('countElemDirectory', $countElemDirectory, time()+3600); //если нет создаем новый куки хранящий текущее количество файлов в директории
			}
			elseif ($_COOKIE['countElemDirectory']<$countElemDirectory) {
				
				include ("setCookies.php");
				echo "Количество файлов в директории увеличилось";
				exit();
			}
			elseif ($_COOKIE['countElemDirectory']>$countElemDirectory) {
				include ("setCookies.php");
				echo "Количество файлов в директории уменьшилось";	
				exit();
			} 
			else {
				include ("setCookies.php");
				echo "Количество файлов осталось без изменений";
				exit();
			}
	} 
	else {
		echo "Не удалось войти на $ftpServer под пользователем $ftpLogin";
	}

	ftp_close($ftp);

}

else {
	echo "Переданы не все параметры в форму";
}





?>
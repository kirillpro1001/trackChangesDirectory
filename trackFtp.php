<?php 




if (isset($_POST['ftpServer'],$_POST['login'],$_POST['password'],$_POST['ftpDirectory'])) { 

	$ftpServer = $_POST['ftpServer'];
	$ftpLogin = $_POST['login'];
	$ftpPassword = $_POST['password'];
	$ftpDirectory = $_POST['ftpDirectory'];

	$ftp = ftp_connect($ftpServer) or die("Не удалось установить соединение с $ftpServer");



	if(ftp_login($ftp,$ftpLogin,$ftpPassword)) {
		$arrDirectory = ftp_nlist($ftp,$ftpDirectory) or die ("Не удалось найти указанную директорию");
		$countElemDirectory = count($arrDirectory);
		if (!isset($_COOKIE['countElemDirectory'])) {
			setcookie('countElemDirectory', $countElemDirectory, time()+3600);
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





?>
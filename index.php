<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Проверка обновления каталога на FTP-сервере</title>
</head>
<body>
	<form action="trackFtp.php" method="post">
		<div>
			<label for="ftpServer">
				Адрес FTP-сервера: <input type="text" name="ftpServer"> 
			</label>
		</div>

		<div>
			<label for="login">
				Логин FTP-сервера: <input type="text" name = "login">
			</label>
		<div>

		<div>

			<label for="password">
				Пароль FTP-сервера: <input type="password" name = "password">
			</label>

		</div>

		<div>
			<label for = "ftpDirectory">
				Директория FTP-сервера: <input type="text" name = "ftpDirectory">
			</label>
		</div>

		<input type="submit">
	</form>
</body>
</html>
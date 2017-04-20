<?php
	session_start();

	$login = $_POST['login'];
	$pass = md5($_POST['pass']);

	// Подключение к серверу MySQL (соединение с сервером MySQL)   	
	// $mysqli = new mysqli('localhost', 'root', '', 'kurs'); // параметры подключения для Денвера
	$mysqli = new mysqli('mysql.hostinger.ru', 'u583616364_user', '12345q', 'u583616364_kurs'); // параметры подключения для выбранного хостинга       
	
	// Проверка подключения (соединения)
	if(mysqli_connect_errno())
	{
		printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		exit;
	}

	// Подготовленное выражение: 
	$stmt = $mysqli->prepare("SELECT id FROM users WHERE login=? and pass=?"); // шаблон запроса
	$stmt->bind_param('ss', $login, $pass); // binds variable to a prepared statement as parameter 
	$stmt->execute(); // выполнение подготовленного выражения (выполнение запроса) 
	$stmt->bind_result($id); // объявление переменной для заготовленного выражения 
	
	if($stmt->fetch()) // $stmt->fetch() - выборка значений 
	{
		$flag=1;
	}
	else
	{
		$flag=0;
	}
	
	$stmt->close(); // закрытие выражения 
	
	$mysqli->close(); // закрытие подключения (закрытие соединения) 

	if($flag==1)
	{
		$_SESSION['id_user']=$id;
		header('Location: write.php');
		die();
	}
	else
	{
		$_SESSION['mess']="!!! Неверная пара логин-пароль";
		header('Location: login.php');
		die();
	}
?>


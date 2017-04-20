<?php 
	session_start();
	
	$id_user = $_SESSION['id_user'];
	$topic = $_POST['topic'];
	$mess = $_POST['mess'];
	$d = date("Y-m-d H:i:s"); // date() - форматирует системную дату/время  	
	
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
	$stmt = $mysqli->prepare("INSERT INTO mess (id_user, topic, mess, d) VALUES (?, ?, ?, ?)"); // шаблон запроса 
	$stmt->bind_param('isss', $id_user, $topic, $mess, $d); // binds variable to a prepared statement as parameter 
	$stmt->execute(); // выполнение подготовленного выражения (выполнение запроса) 
	
	$stmt->close(); // закрытие выражения 
	$mysqli->close(); // закрытие подключения (закрытие соединения) 
	
	header('Location: guest.php'); // в самом конце перенаправим на просмотр всех сообщений в Гостевой_Книге 
?>


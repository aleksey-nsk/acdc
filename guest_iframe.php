<html>
	<head>
		<title> guest_iframe_php </title>
		<style>
			body { font-family: "Times New Roman"; }
		</style>
	</head>
	<body bgcolor="#A4A4A4" text="black" style="overflow-x: hidden;">  
		<?php 
			// Подключение к серверу MySQL (соединение с сервером MySQL) 
			// $mysqli = new mysqli('localhost', 'root', '', 'kurs'); // параметры подключения для Денвера
			$mysqli = new mysqli('mysql.hostinger.ru', 'u583616364_user', '12345q', 'u583616364_kurs'); // параметры подключения для выбранного хостинга                 
			
			// Проверка подключения (соединения) 
			if(mysqli_connect_errno())
			{
				printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
				exit;
			} 
			
			// Посылаем запрос серверу: 
			$stmt = $mysqli->query("SELECT mess.* , users.fio, users.pic 
									FROM mess JOIN users ON users.id = mess.id_user 
									ORDER BY d DESC");
			
			$num = $stmt->num_rows; // возвращает число строк в результате запроса 
			
			// Выбираем результаты запроса: 
			for($i=0; $i<$num; $i++)
			{		
				$row = $stmt->fetch_assoc(); 
				
				// Выведем аватарку если она есть:
				if ($row['pic'] != 'nopicture')
				{
					echo '<IMG src="/'.$row['pic'].'">';  
					echo "<br />";
				}
				
				echo "<b>".$row['fio']." (".$row['d'].")"."<br>"."Тема: "."</b>".$row['topic']."<br>".
					 "<b>"."Сообщение: "."</b>".$row['mess']."<br><br><hr><br>";                 
			}
			
			$stmt->close(); // освобождаем память 
			
			$mysqli->close(); // закрытие подключения (закрытие соединения) 
		?>	
	</body>
</html>
	




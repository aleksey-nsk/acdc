<?php
	session_start();  
	
	$fio = $_POST['fio'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$phrase = $_POST['phrase'];

	if(strlen($fio)==0 || strlen($login)==0 || strlen($pass)==0 || strlen($email)==0) 
	{
		$_SESSION['mess']="!!! Не заполнены обязательные поля:";
		
		if(strlen($fio)==0) $_SESSION['mess']=$_SESSION['mess']."<br>"."Имя";		
		else setcookie("fio", $fio, time()+3600); // устанавливаем куку на 1 час 
			
		if(strlen($login)==0) $_SESSION['mess']=$_SESSION['mess']."<br>"."Логин";
		else setcookie("login", $login, time()+3600);
			
		if(strlen($pass)==0) $_SESSION['mess']=$_SESSION['mess']."<br>"."Пароль";
		// на пароль куку ставить не будем
		
		if(strlen($email)==0) $_SESSION['mess']=$_SESSION['mess']."<br>"."Почта";
		else setcookie("email", $email, time()+3600);
				
		header('Location: sign.php'); // редирект браузера 
		
		die(); // функция die() это псевдоним exit() - прерывание скрипта прямо в этом месте
	}

	setcookie("fio", $fio, time()+3600);
	setcookie("login", $login, time()+3600);
	setcookie("email", $email, time()+3600);
	
	if(strcmp($phrase, $_SESSION['phrase'])!=0)
	{
		$_SESSION['mess']="!!! Неверная ключевая фраза";
		header('Location: sign.php'); 
		die();  
	}
	
	// функция md5() возвращает MD5 хэш строки.
	// md5() это алшоритм шифрования для пароля. Делает 20-значный
	// буквенно-цифровой набор, который и будет храниться в БД.
	// Зашифруем наш пароль:
	$pass = md5($pass);  
	
	$pic = 'nopicture'; // пусть если нет картинки, то просто хранится это слово 
	
	if(strlen($_FILES['pic']['tmp_name'])!=0) // tmp_name временное имя которое делает Апач
	{		
		// list() используется для того, чтобы присвоить списку переменных 
		// значения за одну операцию (подобно массиву):
		list($disk, $folder, $name)= explode("\\", $_FILES['pic']['tmp_name']);		
		list($fname, $fext)= explode('.', $name); // $name - это само имя без пути  				
		$arname = explode('.', $_FILES['pic']['name']); 		
		$ext = $arname[count($arname)-1]; // определяем расширение: jpg, jpeg, png, gif, bmp или другое 		
		
		if(strcmp($ext,"png")==0 || strcmp($ext,"bmp")==0)
		{			
			$_SESSION['mess']="Неизвестный тип картинок"."<br />"."Допустимые типы: jpg, jpeg, gif";
			header('Location: sign.php');
			die();
		}
		
		$pic='pic/'.$fname.time().".".$ext;
				
		move_uploaded_file($_FILES['pic']['tmp_name'], $pic); 
		// эта ф-ция перемещает загруженный на сервер файл в новое место
			
		$nw=150; // ширина отображаемой аватарки  
				
		list($width, $height) = getimagesize($pic); 
		// array getimagesize (string filename) - функция получает размер изображения
		
		// Масштабируем картинку:	
		$new_width  = $nw;
		$new_height = $nw * $height / $width;
			
		$image_p = imagecreatetruecolor($new_width, $new_height);
		// imagecreatetruecolor() - создаёт новое изображение true color
		// resource imagecreatetruecolor (int x_size, int y_size)
		// imagecreatetruecolor() возвращает идентификатор чёрно-белого изображения размером x_size на y_size
				
		if(strcmp($ext,"gif")==0)
		{
			$image = imagecreatefromgif($pic);
			// imagecreatefromgif() - создаёт новое изображение из файла или URL 
			// resource imagecreatefromgif (string filename)
			// imagecreatefromgif() возвращает идентификатор изображения, полученного из данного файла filename
		}
		elseif(strcmp($ext,"jpg")==0 || strcmp($ext,"jpeg")==0)
		{
			$image = imagecreatefromjpeg($pic);
		}
		else
		{			
			$_SESSION['mess']="!!! Неизвестный тип картинок"."<br />"."Допустимые типы: jpg, jpeg, gif";
			header('Location: sign.php');
			die();
		}
		
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		// imagecopyresampled() - копирует и изменяет размеры части изображения с пересэмплированием 
		// int imagecopyresampled (resource dst_im, resource src_im, 
		//                         int dstX, int dstY, int srcX, int srcY, 
		//                         int dstW, int dstH, int srcW, int srcH)           
		
		if(strcmp($ext,"gif")==0)
		{
			imagegif($image_p, $pic);
			// imagegif() - выводит изображение в браузер или файл
			// int imagegif (resource image [, string filename])
			// Эта функция выводит изображение на стандартный вывод (обычно в браузер) 
			// или, если задано имя файла аргументом filename, в файл 
		}
		elseif(strcmp($ext,"jpg")==0 || strcmp($ext,"jpeg")==0)
		{
			imagejpeg($image_p, $pic);
		}
		else
		{
			$_SESSION['mess']="Неизвестный тип картинок"."<br />"."Допустимые типы: jpg, jpeg, gif";
			header('Location: sign.php');
			die();
		}
	}
	
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
	$stmt = $mysqli->prepare("SELECT id FROM users WHERE login=?"); // шаблон запроса
	$stmt->bind_param('s', $login); // binds variable to a prepared statement as parameter 
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

	if($flag==0)
	{
		// Подготовленное выражение:
		// шаблон запроса:
		$stmt = $mysqli->prepare("INSERT INTO users (fio, login, pass, email, pic) VALUES (?, ?, ?, ?, ?)"); 
		// binds variable to a prepared statement as parameter:
		$stmt->bind_param('sssss', $fio, $login, $pass, $email, $pic); 
		$stmt->execute(); // выполнение подготовленного выражения (выполнение запроса)
		$stmt->close(); // закрытие выражения
	}

	$mysqli->close(); // закрытие подключения (закрытие соединения) 

	if($flag==0)
	{
		$_SESSION['mess']="Вы успешно зарегистрированы, можете выполнить вход :-))";
		header('Location: login.php');
		die();
	}
	else
	{
		$_SESSION['mess']="!!! Такой логин уже занят <br />Выберите другой"; 
		header('Location: sign.php');
		die();
	}  
?>






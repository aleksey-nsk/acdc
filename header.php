<?php
	session_start(); 
	// In order to have access to session variables at any site pages, it is necessary 
	// to write only one line in the begining of each file, in which we need to use 
	// sessions. And then we can refer to the elements of the $_SESSION array  		
?>

<!DOCTYPE html> <!-- version HTML 5 for all documents -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<title>
			<?php  				 
				// $_SERVER - it is superglobal array, that stores the data, received from the server 				
				if(strcmp($_SERVER['REQUEST_URI'],"/index.php")==0) echo "Главная";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/")==0) echo "Главная";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/history.php")==0) echo "История";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/foto.php")==0) echo "Фото";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/video.php")==0) echo "Видео";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/albums.php")==0) echo "Альбомы"; 
				elseif(strcmp($_SERVER['REQUEST_URI'],"/best.php")==0) echo "Лучшее";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/feedback.php")==0) echo "Feedback";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/guest.php")==0) echo "Гостевая";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/sign.php")==0) echo "Регистрация";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/login.php")==0) echo "Войти";
				elseif(strcmp($_SERVER['REQUEST_URI'],"/write.php")==0) echo "Написать";
				else echo "404"; // Error 404 - Page Not Found 
				
				/* Функция strcmp() - это сравнение строк, безопасное для данных в двоичной форме.
				   int strcmp ( string str1, string str2 )
				   Возвращает отрицательное число, если str1 меньше, чем str2; 
				   положительное число, если str1 больше, чем str2, и 0 если строки равны.
				   Эта функция учитывает регистр символов */ 
			?>		
		</title>
		<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon" />	
		<link href="css/styles.css" rel="stylesheet" type="text/css" /> 				
		<script type="text/javascript" src="javascript/jquery-2.2.0.js"> </script> 
		<script type="text/javascript" src="javascript/foto.js"> </script> 
		<script type="text/javascript" src="javascript/sloi.js"> </script> 
		<script type="text/javascript" src="javascript/mail.js"> </script> 		
	</head>
	<body>   		 
		<div id="main">
    		<div id="header"> 
				<div id="logo"> <img src="images/logo.jpg"> </div>
				<div id="title"> LET THERE BE ROCK </div>
				<div id="menu"> 
					<div id="menu_wrapper">
						<div class="menu_button"> <a href="index.php"> Главная </a> </div> 
						<div class="menu_button"> <a href="history.php"> История </a> </div>
						<div class="menu_button"> <a href="foto.php"> Фото </a> </div>
						<div class="menu_button"> <a href="video.php"> Видео </a> </div>			
						<div class="menu_button"> <a href="albums.php"> Альбомы </a> </div> 
						<div class="menu_button"> <a href="best.php"> Лучшее </a> </div>			
						<div class="menu_button"> <a href="guest.php"> Гостевая </a> </div>
						<div class="menu_button"> <a href="feedback.php"> Feedback </a> </div>
					</div> 
				</div>
			</div>
    		<div id="ref"> 
				<div class="ref_wrapper"> <a href="https://vk.com/club145450713" target="_blank"> <img src="images/ref-vk.jpg"> </a> </div> 
				<div class="ref_wrapper"> <a href="https://twitter.com/acdc" target="_blank"> <img src="images/ref-twit.jpg"> </a> </div>
				<div class="ref_wrapper"> <a href="http://www.acdc.com/us/home" target="_blank"> <img src="images/ref-official.jpg"> </a> </div>
			</div>
			
			<!-- Окончание в файле bottom.php  -->



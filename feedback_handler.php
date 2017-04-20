<?php 
	session_start(); // чтобы использовать сессионную переменную  
	
	// Отправим письмо только если все поля формы заполнены: 
	if(!empty($_POST['user_name']) and !empty($_POST['mail']) and !empty($_POST['message']))   
	{
		// Функция strip_tags() удаляет HTML и PHP тэги из строки 
		// Функция trim() удаляет пробелы из начала и конца строки
		$user_name = trim(strip_tags($_POST['user_name'])); 				
		$mail      = trim(strip_tags($_POST['mail']));
		$message   = trim(strip_tags($_POST['message']));
																
		// Зададим параметры для функции mail()			
		$to = "web-site-2@yandex.ru"; // письмо придет мне на почту   				
		$subject = "The letter from my AC-DC site"; // тема письма
		$mess = "USER: " . $user_name . ". EMAIL: " . $mail . ". MESSAGE: " . $message; // текст письма  				
		
		// Функция mail() отправляет почту 
		mail($to, $subject, $mess); 
		
		// С хостинга письма приходят мне на почту, а с Денвера нет! Чтобы письма 
		// приходили с Денвера, необходимо провести дополнительные настройки!  
								 															  
		$_SESSION['feedback'] = "Ваше сообщение успешно отправлено. Вы получите ответ в ближайшее время :-))";
		header('Location: feedback.php');
		exit;
	} 
	else 
	{ 				
		$_SESSION['feedback'] = "Для отправки сообщения заполните все поля!!!";
		header('Location: feedback.php');
		exit;
	}
?>


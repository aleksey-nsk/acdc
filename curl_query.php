<?php

function curl_get($url, $referer = 'http://www.google.com')
{	
	$ch = curl_init(); // инициализировали curl и сохранили его в переменную 
	
	// Настраиваем опции:
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0");
	curl_setopt($ch, CURLOPT_REFERER, $referer);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	
	$data = curl_exec($ch); // выполняем запрос, и получаем ответ от сервера в переменную $data 
	curl_close($ch); // закрываем curl 
	return $data; // возвращаем $data из функции в то место, где вызвали функцию curl_get()  
} 
  
?>

<html>
	<head>
		<title> Parsing </title>
		<style> body { font-family: "Times New Roman"; } </style>
	</head>
	<body bgcolor="#A4A4A4" text="black" style="overflow-x: hidden;">  
		<?php 		
			include_once('curl_query.php'); // файл содержит функцию curl_get() 
			
			// Напишем функцию, которая вырезает нужный кусок из всей страницы: 
			// $p1 - строка, в которой будет происходить поиск нужной информации
			// $p2 - уникальный элемент для начала поиска
			// $p3 - уникальный элемент для конца поиска
			function Cut($p1, $p2, $p3)
			{
			  $num1 = strpos($p1, $p2); // функция strpos() возвращает позицию первого вхождения подстроки 
			  if($num1 === false) return 0; // проверяем, есть ли у нас вообще вхождение подстроки 				
			  $num2 = substr($p1, $num1); // фактически отсекли всё, что выше $p2   				
			  return substr($num2, 0, strpos($num2, $p3)); // фактически отсекли всё, что ниже $p3 и вернули результат				
			}
			// string substr(string string, int start [, int length]) - возвращает подстроку 
			// строки string, длиной length, начинающуюся со start символа по счету
			
			// Функция, которая уберет ненужные куски кода:
			function Replace($str)
			{				
				$result = str_replace('src="/', 'src="http://www.ac-dc.net/', $str); // теперь увидим картинки				
				$result = str_replace('Read More', '', $result); // уберем надпись Read More
				
				// Уберём куски незагрузившегося логотипа:
				$result = str_replace('<p class="ctr"><img src="', '', $result);
				$result = str_replace('../img1/bolt-35.png" style="max-width:25px;height:auto;" />', '', $result);

				$result = preg_replace('~</?a[^>]*>~isu', ' ', $result); // превратим гиперссылки в обычный текст 
				return $result;
			}
			
			// Получим инфу с вёб-страницы:
			$get_info = curl_get('http://www.ac-dc.net/news1/acdc_news.php'); 
			
			// Вырежем нужный кусок из всей страницы: 
			$String = Cut($get_info, '<div class="col_66-33_1">', '<div class="col_66-33_2_sidebar">' );
			
			// Уберем ненужные куски кода:
			$String = Replace($String);
			
			// Выведем на экран итоговую строку:
			echo $String;   						
		?>	
	</body>
</html>


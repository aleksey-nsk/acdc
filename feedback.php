<?php 
	include("header.php"); 	
?> 

	<div id="content">
		<br />
		ОБРАТНАЯ СВЯЗЬ 
		<br />
				
		<!-- Форма обратной связи 
			 Для того, чтобы при нажатии на кнопку отправки формы, у нас происходила
			 проверка этой формы, вешаем запуск нашего скрипта на тег form, с помощью
			 команды onSubmit="return chechForm(this)" --> 
		<div id="feedback_forma">  
			<form method="post" action="feedback_handler.php" onSubmit="return checkForm(this)"> 			
				<label for="user_name"> Имя </label> 
				<input maxlength="30" type="text" name="user_name" /> 
					
				<label for="mail"> E-mail </label>
				<input maxlength="30" type="text" name="mail" /> 
										
				<label for="message"> Сообщение </label>
				<textarea rows="7" cols="50" name="message"> </textarea>   
				<br />
				<input type="submit" value="Отправить" /> 			
			</form>	
		</div>
		
		<div id="feedback_message"> 
			<?php
				echo $_SESSION['feedback'];
				$_SESSION['feedback'] = "";    				
			?>
		</div>
						
	</div>
	
<?php
	include("bottom.php");
?> 


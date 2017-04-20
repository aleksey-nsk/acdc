<?php
	include("header.php");
?>

<?php
	// Если юзер хочет зайти в Написать, но при этом не залогинился, то
	// его следует перенаправить на страницу Войти - login.php
	if($_SESSION['id_user']==0)
	{
		header("Location: login.php");
		die();
	}
?>

	<div id="content">
		<br />
		ГОСТЕВАЯ КНИГА
		
		<div id="guest_menu"> 
			<div id="guest_menu_wrapper">
				<div class="guest_menu_button"> <a href="sign.php"> Регистрация </a> </div> 
				<div class="guest_menu_button"> <a href="login.php"> Войти </a> </div>
				<div class="guest_menu_button"> <a href="write.php"> Написать </a> </div>
				<div class="guest_menu_button"> <a href="guest.php"> Показать </a> </div>			
				<div class="guest_menu_button"> <a href="logout.php"> Выйти </a> </div> 				
			</div> 
		</div>
		
		<div id="guest_forma">
			<form action="write_handler.php" method="post" enctype="multipart/form-data">
				Тема
				<br />
				<input name="topic" type="text" size="55" />
				<br /> 
				<br />
				Сообщение
				<br />
				<textarea name="mess" cols="50" rows="10"> </textarea>
				<br />
				<input id="submit_button" type="submit" value="Опубликовать" />
			</form>
		</div>
		
	</div> 
	
<?php
	include("bottom.php");
?> 






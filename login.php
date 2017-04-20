<?php
	include("header.php");
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
			<form action="login_handler.php" method="post" enctype="multipart/form-data">
				<label> Логин </label>
				<input name="login" type="text" />
				
				<label> Пароль </label>
				<input name="pass" type="password" />
				
				<br> <br>
				<input id="submit_button" type="submit" value="Войти" />
			</form>
		</div>
		
		<div id="guest_message">
			<?php
				echo $_SESSION['mess'];
				$_SESSION['mess']="";
			?>
		</div>
		
	</div>
	
<?php
	include("bottom.php");
?>  





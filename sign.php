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
			<form action="sign_handler.php" method="post" enctype="multipart/form-data">
				<label> Имя </label> 
				<input name="fio" value="<?=$_COOKIE["fio"]?>" type="text" /> 
				
				<label> Логин </label>
				<input name="login" value="<?=$_COOKIE["login"]?>" type="text" />
				
				<label> Пароль </label>
				<input name="pass" type="password" />
				
				<label> Почта </label>
				<input name="email" value="<?=$_COOKIE["email"]?>" type="text" />
				
				<label> Фото </label>
				<input id="foto" name="pic" type="file" />
				
				<label> Введите текст с картинки </label>
				<input name="phrase" />		
				
				<div id="captcha"> <img src="mycaptcha.php"> </div>					
				<input id="submit_button" type="submit" value="Зарегистрироваться" /> 				
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


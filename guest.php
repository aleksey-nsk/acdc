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
		
		<iframe src="guest_iframe.php"		                    		           
				width="80%"
				height="84%"
				scrolling="auto"
				marginheight="30"
				marginwidth="30"
				frameborder="0">
		</iframe>
		
	</div>
	
<?php
	include("bottom.php");
?> 


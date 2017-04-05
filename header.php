<?php
	
	$query = 'select * from country_';
	$result = $dbconnect->query($query);
	if($_SESSION['userLogin']){
		$userLogin = $_SESSION['userLogin'];
		$userid = $_SESSION['userid'];
	}

?><div id="header">
	<div class="inner-header">
		<img id="logo" src="/images/logotypes/logo.png" alt="лого">

		<div id="searchform">
			<div class="links">
				<a href="#"><img src="/images/social/vk.jpg" alt="VK"></a>
				<a href="#"><img src="/images/social/twitch.jpg" alt="TWITCH"></a>
				<a href="#"><img src="/images/social/youtube.jpg" alt="YOUTUBE"></a>
				<a href="#"><img src="/images/social/twitter.jpg" alt="TWITTER"></a>
			</div>
			<div class="search">
			<form action="#" id="search">
				<input type="text" placeholder="Поиск...">
			</form>
			</div>
		</div>
		<nav class="nav">
			<ul id="nav">
				<li><a href="/">Главная</a></li>
				<li><a href="#">Лига</a></li> 
				<li><a href="/stream">Стримы</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="/tournaments/">Турниры</a></li>
				<li><a href="/teams">Команды</a></li>
				<li><a href="#">Медиа</a></li>
				<li><?php 
					if($userLogin){ 
						echo '<a href="/user" id="lk-button">'.$userLogin.'</a>';
					}else{
						echo '<a href="#" id="signInButton">Войти</a>';
					}
					?></li>
			</ul>
		</nav>
	</div>
	<div class="sign-in-panel-wraper">
		<div class="sign-in-panel" style="display: block;">
			<img src="http://public-pc.com/wp-content/uploads/2016/03/Oshibka-pri-zapuske-prilozheniya-0xc000007b-1.png" alt="Закрыть" class='sign-in-close'>
			<p style="text-align: center;">Авторизация</p>
			<form action="#" class='auth-form'>
				<p>Имя пользователя/E-mail</p>
				<input type="text" name='userLogin'>
				<p>Пароль</p>
				<input type="password" name='userPassword'>
				<input type="submit" value="Войти" id="auth-form-submit">
				<p><a href="#">Забыли пароль?</a>/<a href="#" id="register-init">Регистрация</a></p>
				<p class="error-mess"></p>
			</form>
		</div>
		<div class="register-panel" style="display: none">
			<img src="http://public-pc.com/wp-content/uploads/2016/03/Oshibka-pri-zapuske-prilozheniya-0xc000007b-1.png" alt="Закрыть" class='sign-in-close'>
			<p style="text-align: center;">Регистрация</p>
			<form action="#" class='auth-form'>
				<input type="text" name='userSurName' placeholder="Фамилия" style="border: 1px solid red">
				<input type="text" name='userName' placeholder="Имя" style="border: 1px solid red">
				<input type="text" name='userEmail' placeholder="Email" style="border: 1px solid red">
				<input type="text" name='userLogin' placeholder="Имя пользователя" style="border: 1px solid red">
				<input type="password" name='userPassword' placeholder="Пароль" style="border: 1px solid red">
				<input type="text" name='userSkype' placeholder="Логин Skype">
				<input type="text" name='userVk' placeholder="Страница Вконтакте">
				<input type="text" name='userPhoneNumber' placeholder="Номер телефона">
				<select name="country-select">
					<?php
						echo "<option value='' disabled selected>Выберите страну</option>";
						$numrow = $result->num_rows;
						for($i = 0; $i < $numrow; $i ++){
							$row = $result->fetch_assoc();
							echo "<option>".$row['country_name_en']."</option>";
						}

					?>
				</select>
				<select name="region-select"></select>
				<select name="city-select">
				</select>
				<p>Дата рождения</p>
				<input type="date" name="userBornDate">
				<input type="submit" value="Зарегистрироваться" id="auth-form-register">
				<p class="error-mess"></p>
			</form>
		</div>
	</div>
</div>
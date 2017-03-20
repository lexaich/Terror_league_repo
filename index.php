<?php
	header('Content-type: text/html; charset=utf-8');
	require "php/dbdata.php";
	$dbconnect->query('set names utf8');
	$query = 'select * from news';
	$result = $dbconnect->query($query);
	if($result){
		$numrow = $result->num_rows;
		$news_array = array();
		for($i = 0; $i < $numrow; $i++){
			$row = $result->fetch_assoc();
			array_push($news_array, $row);
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="styles.css">
	<link href="http://allfont.ru/allfont.css?fonts=roboto-condensed" rel="stylesheet" type="text/css" />
	<script src='js/index.js'></script>
	<meta charset="UTF-8">
	<title>Terror</title>
</head>
<body>
	<div class="wrapper">

		<div id="header">
			<div class="inner-header">
				<img id="logo" src="http://lol-game.ru/attachments/sltv-png.81392/" alt="лого">
				<nav>
					<ul id="nav">
						<li><a href="#">HOME</a></li>
						<li><a href="#">TOURNAMENTS</a></li> 
						<li><a href="#">ABOUT US</a></li>
						<li><a href="#" id='signInButton'>SIGNIN</a></li>
					</ul>
				</nav>
				<div class="sign-in-panel-wraper">
					<div class="sign-in-panel" style="display: block;">
						<img src="http://public-pc.com/wp-content/uploads/2016/03/Oshibka-pri-zapuske-prilozheniya-0xc000007b-1.png" alt="Закрыть" class='sign-in-close'>
						<p style="text-align: center;">Авторизация</p>
						<form action="#" class='auth-form'>
							<p>Имя пользователя/E-mail</p>
							<input type="text" name='userLogin'>
							<p>Пароль</p>
							<input type="text" name='userPassword'>
							<input type="submit" value="Войти" id="auth-form-submit">
							<p><a href="#">Забыли пароль?</a>/<a href="#" id="register-init">Регистрация</a></p>
						</form>
					</div>
					<div class="register-panel" style="display: none">
						<img src="http://public-pc.com/wp-content/uploads/2016/03/Oshibka-pri-zapuske-prilozheniya-0xc000007b-1.png" alt="Закрыть" class='sign-in-close'>
						<p style="text-align: center;">Регистрация</p>
						<form action="#" class='auth-form'>
							<input type="text" name='userLogin' placeholder="Фамилия">
							<input type="text" name='userLogin' placeholder="Имя">
							<input type="text" name='userLogin' placeholder="Email">
							<input type="text" name='userLogin' placeholder="Имя пользователя">
							<input type="text" name='userLogin' placeholder="Пароль">
							<input type="text" name='userLogin' placeholder="Логин Skype">
							<input type="text" name='userLogin' placeholder="Страница Вконтакте">
							<input type="text" name='userLogin' placeholder="Номер телефона">
							<select name="country-select">
								<option value="country">Выберите страну</option>
							</select>
							<select name="city-select">
								<option value="city">Выберите город</option>
							</select>
							<p>Дата рождения</p>
							<input type="date">
							<input type="submit" value="Зарегистрироваться" id="auth-form-register">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="contents">
			<div class="midside">
				<?php

					for($i = 0; $i < count($news_array); $i++){
						?>
						<div class="inner-content">

							<div class="news-photo"><img src='<?php echo $news_array[$i]['newsPhoto']; ?>' alt="фотошо новости">
							</div>
							<div class="news-title"><?php echo $news_array[$i]['newsTitle']; ?></div>
							<div class="news-description"><?php echo $news_array[$i]['newsDescription']; ?>
							</div>
						</div>
					<?php
				}

				?>
			</div>
			<div class="rightside">
				<div class="tornaments">
					<div class="inner-sidebar">
						<div class="tornament">s</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">s</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">s</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">s</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">s</div>
					</div>
				</div>


			</div>
		</div>
		<div id="footer">
			<div class="inner-footer">footer</div>
		</div>

	</div>

</body>
</html>
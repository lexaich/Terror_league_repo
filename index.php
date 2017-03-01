<?php
	header('Content-type: text/html; charset=utf-8');
	require "php/dbdata.php";
	@ $dbconnect = new mysqli($dbDataUser->host, $dbDataUser->login, $dbDataUser->password, $dbDataUser->database);
	if(mysqli_connect_errno()){
		echo "<p class='no-connect-db'>Не удалось подлючиться к базе данных. Повторите попытку позже.</p>".$dbDataUser->login.$dbDataUser->password;
		exit;
	}
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
	<meta charset="UTF-8">
	<script src="/js/jquery.js"></script>
	<script src="/js/script.js"></script>
	<title>Terror</title>
</head>
<body>
<script>

function toggleLogin(){
$(".login-form").fadeToggle();
}
function toggleRegister(){
$(".register-form").fadeToggle();
}

</script>
	<div class="wrapper">

		<div id="header">
			<div class="inner-header">
<img id="logo" src="/images/logo.png" alt="лого">

<div id="searchform">
	<div class="links">
		<a href="#"><img src="/images/vk.jpg" alt="VK"></a>
		<a href="#"><img src="/images/twitch.jpg" alt="TWITCH"></a>
		<a href="#"><img src="/images/youtube.jpg" alt="YOUTUBE"></a>
		<a href="#"><img src="/images/twitter.jpg" alt="TWITTER"></a>
	</div>
	<div class="search">
	<form action="#" id="search">
		<input type="text" placeholder="Поиск...">
	</form>
	</div>
</div>
<a onclick="toggleLogin()" class="btn-login">Войти</a>
<a onclick="toggleRegister()" class="btn-login">Зарегистрироваться</a>
<nav class="nav">
	<ul id="nav">
		<li><a href="#">Главная</a></li>
		<li><a href="#">Лига</a></li> 
		<li><a href="#">Стримы</a></li>
		<li><a href="#">Новости</a></li>
		<li><a href="#">Турниры</a></li>
		<li><a href="#">Команды</a></li>
		<li><a href="#">Медиа</a></li>
	</ul>
</nav>
			</div>
		</div>

<div id="banner">
	<img src="/images/banner.jpg" alt="большой большой баннер турнира">
</div>

		<div class="contents">
			<div class="midside">
			<p class="title">Новости лиги</p>
				<?php
					for($i = 0; $i < count($news_array); $i++){
						?>
						<div class="inner-content">

							<div class="photo"><img src='<?php echo $news_array[$i]['newsPhoto']; ?>' alt="фотошо новости">
							</div>
							<div class="news-title"><?php echo $news_array[$i]['newsTitle']; ?></div>
							<div class="description"><?php echo $news_array[$i]['newsDescription']; ?></div>
							<a href="#">Читать далее...</a>
						</div>
					<?php
				}
				?>
			</div>
			<div class="rightside">
			<p class="title">Турниры</p>
					<div class="inner-rightside">
						<div class="tornaments">

							<div class="tornament">
								<img src="/images/teams/vp.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/Meteor.png" alt="Лого2">
							</div>
							<div class="tornament">
								<img src="/images/teams/Meteor.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/vp.png" alt="Лого2">
							</div>
							<div class="tornament">
								<img src="/images/teams/vp.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/Meteor.png" alt="Лого2">
							</div>
							<div class="tornament">
								<img src="/images/teams/Meteor.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/vp.png" alt="Лого2">
							</div>
							<div class="tornament">
								<img src="/images/teams/vp.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/Meteor.png" alt="Лого2">
							</div>
							<div class="tornament">
								<img src="/images/teams/Meteor.png" alt="Лого1">
								<img src="/images/teams/X.bmp" alt="cross">
								<img src="/images/teams/vp.png" alt="Лого2">
							</div>

						</div>
					</div>
				


			</div>
		</div>
		<div id="footer">
			<div class="inner-footer">
				<div>copyright</div>
			</div>
		</div>

<!--  формы рвхода и регистрации      -->
	</div>
<div class="login-form">
  <form class="form-login" action="#">
    <p class="clearfix">
        <label for="login">Логин</label>
        <input type="text" name="login" id="login" placeholder="Логин">
    </p>
    <p class="clearfix">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" placeholder="Пароль">
    </p>
    <p class="clearfix">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Запомнить меня</label>
    </p>
    <p class="clearfix">
        <input type="submit" name="submit" value="Войти">
    </p>      
</form>
</div>

<div class="register-form">
  <form class="form-register" action="#">
    <p class="clearfix">
        <label for="login-r">Логин</label>
        <input type="text" name="login-r" id="login-r" placeholder="Логин">
    </p>
    <p class="clearfix">
        <label for="password-r">Пароль</label>
        <input type="password" name="password-r" id="password-r" placeholder="Пароль">
    </p>

    <p class="clearfix">
        <label for="password-rr">Повторите Пароль</label>
        <input type="password" name="password-rr" id="password-rr" placeholder="Повторите пароль">
    </p>
   <p class="clearfix">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Email">
    </p>
    
    <p class="clearfix">
        <input type="submit" name="submit" value="Зарегистрироваться">
    </p>      
</form>
</div>

</body>
</html>
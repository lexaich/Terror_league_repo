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
<a onclick="toggleLogin()" class="btn-login">Выйти</a>

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
	<div class="clear">
		<div class="profile" style="width:200px; float:left;margin: 30px;">
		<img src="#" alt="ава участника" style="width:100px; height: 150px;margin-bottom: 35px;">
		<div class="ranked" style="height: 200px;width:100%;"> рейтинг и заслуги участника

		</div>
		</div>

		<div class="midside" style="float:right">
			<div class="info" style="width:840px; height: 150px; margin: 30px 40px 40px 40px;">
				Информация об игроке с редактирование ее
			</div>
			<div class="team" style="width: 400px; height: 350px; float:right;margin: 0px 40px 0px 0px;"> информация о составе команды в кторой он находится
				
			</div>
			<div class="tornament" style="width: 400px; height: 350px;margin: 0px 0px 10px 40px;">
				Информация о текущем турнире в ктором учавствует команда
			</div>	
			</div>
</div>

		<div id="footer">
			<div class="inner-footer">
				<div>copyright</div>
			</div>
		</div>
</div>
</body>
</html>
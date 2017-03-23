<?php
	session_start();
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
	<link rel="stylesheet" href="css/styles.css">
	<link href="http://allfont.ru/allfont.css?fonts=roboto-condensed" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<script src="/js/jquery.js"></script>
	<script src="/js/index.js"></script>
	<script src="/js/getXHR.js"></script>
	<title>Terror-league</title>
</head>
<body>
	<div class="wrapper">

<? include '/header.php';?>

<div id="banner">
	<img src="/images/banners/banner.jpg" alt="большой большой баннер турнира">
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

<!--  формы входа и регистрации      -->
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
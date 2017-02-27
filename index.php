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
	<title>Terror</title>
</head>
<body>
	<div class="wrapper">

		<div id="header">
			<div class="inner-header">
<img id="logo" src="#" alt="лого">
<div id="searchform">
	<div class="links">
		<a href="#"><img src="#" alt="VK"></a>
		<a href="#"><img src="#" alt="TWITCH"></a>
		<a href="#"><img src="#" alt="YOUTUBE"></a>
		<a href="#"><img src="#" alt="TWITTER"></a>
	</div>
	<div class="search">
	<form action="#" id="search">
		<input type="text" placeholder="Поиск...">
	</form>
	</div>
</div>
<nav class="nav">
	<ul id="nav">
		<li><a href="#">menu 1</a></li>
		<li><a href="#">menu 2</a></li> 
		<li><a href="#">menu 3</a></li>
		<li><a href="#">menu 4</a></li>
		<li><a href="#">menu 5</a></li>
	</ul>
</nav>
			</div>
		</div>

<div id="banner">
	<img src="#" alt="большой большой баннер турнира">
</div>

		<div class="contents">
			<div class="midside">
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
				
					<div class="inner-sidebar">
						<div class="tornament"><?php echo 'Русские буквы сука!'?></div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">
							<img src="#" alt="Лого1">
							<img src="#" alt="Крестик">
							<img src="#" alt="Лого2">
						</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">
							<img src="#" alt="Лого1">
							<img src="#" alt="Крестик">
							<img src="#" alt="Лого2">
						</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">
						<img src="#" alt="Лого1">
							<img src="#" alt="Крестик">
							<img src="#" alt="Лого2">
							</div>
					</div>
					<div class="inner-sidebar">
						<div class="tornament">
							<img src="#" alt="Лого1">
							<img src="#" alt="Крестик">
							<img src="#" alt="Лого2">
						</div>
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
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
<nav style="float:left">
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
		<div class="contents">
			<div class="midside">
				<?php

					for($i = 0; $i < count($news_array); $i++){
						?>
						<div class="inner-content">

							<div class="photo"><img src='<?php echo $news_array[$i]['newsPhoto']; ?>' alt="фотошо новости">
							</div>
							<div class="news-title"><?php echo $news_array[$i]['newsTitle']; ?></div>
							<div class="description"><?php echo $news_array[$i]['newsDescription']; ?>
							</div>
						</div>
					<?php
				}

				?>
			</div>
			<div class="rightside">
				<div class="tornaments">
					<div class="inner-sidebar">
						<div class="tornament"><?php echo 'Русские буквы сука!'?></div>
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
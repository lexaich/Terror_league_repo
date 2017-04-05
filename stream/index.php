<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require "../php/dbdata.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="styles.css">
	<link href="http://allfont.ru/allfont.css?fonts=roboto-condensed" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/getXHR.js"></script>
	<title>Terror</title>
</head>
<body>

<div class="wrapper">
<? include '../header.php' ;?>
<div id="banner">
	<img src="/images/banners/banner.jpg" alt="большой большой баннер турнира">
</div>
<div class="clear">
	<div class="midside-stream" style="float:left; width:70%;height:400px">
		<div style="width:90%; height:90%; padding: 10px 0px 0px 10px; margin: 20px 0px 0px 40px">сам видеопроигрыватель c твитча вставка </div>
	</div>
	<div class="rightside-stream" id="comments" style="float:right; width: 30%;">
		<a href="">
			<div class="stream" style="margin:10px;height:100px">видео стрим</div>
		</a>
		<a href="">
			<div class="stream" style="margin:10px;height:100px">видео стрим</div>
		</a>
		<a href="">
			<div class="stream" style="margin:10px;height:100px">видео стрим</div>
		</a>
		<a href="">
			<div class="stream" style="margin:10px;height:100px">видео стрим</div>
		</a>
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
d = document;
d.addEventListener("DOMContentLoaded", function(){
	if(d.getElementById('signInButton')){
		d.getElementById('signInButton').addEventListener('click', signIn);
	}
	function signIn(e){
		e.preventDefault();
		d.getElementsByClassName('sign-in-panel-wraper')[0].style.display = 'block';
	}
	for(i = 0; i < d.getElementsByClassName('sign-in-close').length; i++){
		d.getElementsByClassName('sign-in-close')[i].addEventListener('click', function(e){
		d.getElementsByClassName('sign-in-panel')[0].style.display = 'block';
		d.getElementsByClassName('register-panel')[0].style.display = 'none';
		d.getElementsByClassName('sign-in-panel-wraper')[0].style.display = 'none'
		for(i = 0; i < d.getElementsByClassName('auth-form')[1].elements.length; i++){
			d.getElementsByClassName('auth-form')[1].elements[i].value ='';
		}
		;});
	}
	d.getElementById('register-init').addEventListener('click', function(){
		d.getElementsByClassName('sign-in-panel')[0].style.display = 'none';
		d.getElementsByClassName('register-panel')[0].style.display = 'block';
	});
	d.getElementsByName('country-select')[0].addEventListener('change', function(){
		d.getElementsByName('region-select')[0].innerHTML = '<option value="" disabled selected>Выберите регион</option>';
		var data = 'country-name=' + this.value + '&function=getRegion';
		var req = getXHR();
		var url = "php/main.php";
		req.open("POST", url, true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText){
					var arr = JSON.parse(this.responseText);
					for(i = 0; i < arr.length; i++){
						d.getElementsByName('region-select')[0].innerHTML += "<option>" + arr[i] + "</option>";
					}
					console.log(arr);
				}
			}
		}
		req.send(data);
	})
	d.getElementsByName('region-select')[0].addEventListener('change', function(){
		d.getElementsByName('city-select')[0].innerHTML = '<option value="" disabled selected>Выберите город</option>';
		var data = 'region-name=' + this.value + '&function=getCity';
		var req = getXHR();
		var url = "php/main.php";
		req.open("POST", url, true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText){
					var arr = JSON.parse(this.responseText);
					for(i = 0; i < arr.length; i++){
						d.getElementsByName('city-select')[0].innerHTML += "<option>" + arr[i] + "</option>";
					}
					console.log(arr);
				}
			}
		}
		req.send(data);
	});
	d.getElementById('auth-form-submit').addEventListener("click", function(e){
		console.log('auth');
		e.preventDefault();
		var login = d.getElementsByName('userLogin')[0].value;
		var pass = d.getElementsByName('userPassword')[0].value;
		if(!login || !password){
			d.getElementsByClassName('error-mess')[0].innerHTML = "Заполните все поля!";
			return 0;
		}
		var url = "php/main.php";
		var func = 'signin';
		var authoriz = getXHR();
		authoriz.open('POST',url,true);
		authoriz.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		authoriz.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText != '1'){
					d.getElementsByName('userLogin')[0].value = '';
					d.getElementsByName('userPassword')[0].value = '';
					d.getElementById('signInButton').removeEventListener('click', signIn);
					d.getElementById('signInButton').innerHTML = this.responseText;
					d.getElementById('signInButton').setAttribute('href', 'http://terror-league.ru/user/');
					d.getElementById('signInButton').setAttribute('id', 'lk-button');
					d.getElementsByClassName('sign-in-panel-wraper')[0].style.display = 'none';
				}
			}
		};
		var data = 'login='+login+'&password='+pass+'&function='+func;
		authoriz.send(data);
	});
	d.getElementById('auth-form-register').addEventListener('click', function(e){
		console.log('register');
		e.preventDefault();
		var User = {
				surName: d.getElementsByName('userSurName')[0].value,
				name: d.getElementsByName('userName')[0].value,
				email: d.getElementsByName('userEmail')[0].value,
				login: d.getElementsByName('userLogin')[1].value,
				password: d.getElementsByName('userPassword')[1].value,
				skype: d.getElementsByName('userSkype')[0].value,
				vkontakte: d.getElementsByName('userVk')[0].value,
				phone: d.getElementsByName('userPhoneNumber')[0].value,
				country: d.getElementsByName('country-select')[0].value,
				city: d.getElementsByName('city-select')[0].value,
				bornDate: d.getElementsByName('userBornDate')[0].value
		}
		var func = 'registerNewUser';
		if(!User.surName || !User.name || !User.email || !User.login || !User.password){
			d.getElementsByClassName('error-mess')[1].innerHTML = "Заполните все обязательные поля! Они выделены красным!";
			return 0;
		}
		var registerData = "surName=" + User.surName + "&name=" + User.name + "&email=" + User.email + "&login=" + User.login + "&password=" + User.password + "&skype=" + User.skype + "&vkontakte=" + User.vkontakte + "&phone=" + User.phone + "&country=" + User.country + "&city=" + User.city + "&bornDate=" + User.bornDate + "&function=" + func;
		var url = "php/main.php";
		var registerUser = getXHR();
		registerUser.open('POST', url, true);
		registerUser.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		registerUser.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText == '1'){
					d.getElementsByClassName('register-panel')[0].innerHTML = "<p>Регистрация успешно заверщена. Теперь вы можете войти в систему. Страница будет перезагружена</p>";
					setTimeout(function(){
						location.reload();
					}, 5000);
				}
				if(this.responseText == '2'){
					d.getElementsByClassName('error-mess')[0].innerHTML = "Данное имя пользователя, Email или телефон уже зарегистрированы в системе!";
				}
			}
		};
		registerUser.send(registerData);
		
	});
	if(d.getElementById('exit-user')){
		d.getElementById('exit-user').addEventListener('click', function(){
			document.location.href = "exit.php";
			// var exit = getXHR();
			// var func = 'exitUser';
			// var data = "function=" + func;
			// var url = "../php/main.php/";
			// exit.open('POST', url, true);
			// exit.onreadystatechange = function(){
			// 	if (this.readyState == 4 && this.status == 200){
			// 		if(this.responseText == '1'){
			// 			location.href = 'http://terror-league.ru';
			// 		}else{
			// 			console.log(this.responseText);
			// 			alert('Не удалось завершить выход из системы. Перезагрузите страницу и повторите попытку.');
			// 		}
			// 	}
			// }
			// exit.send(data);
		})
	}
});
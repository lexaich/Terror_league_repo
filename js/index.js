d = document;
d.addEventListener("DOMContentLoaded", function(){
	d.getElementById('signInButton').addEventListener('click', function(e){
		e.preventDefault();
		d.getElementsByClassName('sign-in-panel-wraper')[0].style.display = 'block';
	})
	for(i = 0; i < d.getElementsByClassName('sign-in-close').length; i++){
		d.getElementsByClassName('sign-in-close')[i].addEventListener('click', function(e){
		d.getElementsByClassName('sign-in-panel')[0].style.display = 'block';
		d.getElementsByClassName('register-panel')[0].style.display = 'none';
		d.getElementsByClassName('sign-in-panel-wraper')[0].style.display = 'none';});
	}
	d.getElementById('register-init').addEventListener('click', function(){
		d.getElementsByClassName('sign-in-panel')[0].style.display = 'none';
		d.getElementsByClassName('register-panel')[0].style.display = 'block';
	});
	d.getElementById('auth-form-submit').addEventListener("click", function(e){
		e.preventDefault();
		var login = d.getElementsByName('userLogin')[0].value;
		var pass = d.getElementsByName('userPassword')[0].value;
		var data = 'login='+login+'&password='+pass+'&function='+func;
		var url = "php/main.php";
		var func = 'signin';
		var query = getXHR();
		query.open('POST',url,true);
		query.onreadystatechange = function(){
			if (this.readyState == 4 && this.status == 200){
				if(this.responseText)
				{var result = this.responseText;
					console.log(result);
				}
			}
		};
		query.send(data);
	});
});
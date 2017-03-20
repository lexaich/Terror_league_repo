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
});
<?php
header("Content-type: text/javascript");
echo <<< JS
var time = setInterval(setTime, 0);
function setDate(){
	var date = new Date();
	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct", "Nov", "Dec"]
	document.getElementById("date").innerHTML = days[date.getDay()] + ", " + months[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear() + "&nbsp;";
}

function setTime(){
	var time = new Date();
	var hours = time.getHours();
	var mins = time.getMinutes();
	var secs = time.getSeconds();
	if (hours<10)
		hours="0"+hours;
	if (mins<10)
		mins="0"+mins;	
	if (secs<10)
		secs="0"+secs;
	document.getElementById("time").innerHTML = hours + ":" + mins + ":" + secs + "&nbsp;";
}

function checkForm(animal){
	var gender = document.getElementsByName("gender");
	var check=false;
	for (var x=0; x<gender.length; x++){
		if (gender[x].checked){
			check = true;
		}
	}
	if(!check){
		alert ("Please choose a gender for a better match.");
		return false;
	}
	
	if (animal=="dog"){
		var alongDogs = document.getElementById("alongDog").checked;
		var alongChild = document.getElementById("alongChild").checked;
		if (!alongDogs&&!alongChild){
			alert("Please choose at least one option\nwhich you want your pet to get\nalong with for a better match.");
			return false;
		}
	}else{
		var alongDogs = document.getElementById("alongCat").checked;
		var alongChild = document.getElementById("alongChildCat").checked;
		if (!alongDogs&&!alongChild){
			alert("Please choose at least one option\nwhich you want your pet to get\nalong with for a better match.");
			return false;
		}
	}
}
function checkGiveAway(){
	var dogPet = document.getElementById('dogpet').checked;
	var catPet = document.getElementById('catpet').checked;
	if (!dogPet&&!catPet){
		alert ("Please choose the pet you want to give away.");
		return false;
	}	
	
	var dogGend = document.getElementById('petmale').checked;
	var catGend = document.getElementById('petfem').checked;
	if (!dogGend&&!catGend){
		alert ("Please choose a gender.");
		return false;
	}	
	
	var dogAlong = document.getElementById('alongdog').checked;
	var catAlong = document.getElementById('alongcat').checked;
	var noneAlong = document.getElementById('alongnone').checked;
	if (!dogAlong&&!catAlong&&!noneAlong){
		alert ("Please select if your pet gets along with other cats, dogs or none.");
		return false;
	}
	
	var descp = document.getElementById('detailsanimal').value;
	if (descp=="")
	{
		alert ("Please give more details on your pet.");
		return false;
	}
	
	var fmlyName = document.getElementById('familyname').value;
	if (fmlyName=="")
	{
		alert ("Please provide your family name.");
		return false;
	}	
	
	var gvnName = document.getElementById('givenname').value;
	if (gvnName=="")
	{
		alert ("Please provide your given name.");
		return false;
	}	
	
	var email = document.getElementById('email').value;
	if (email=="")
	{
		alert ("Please provide your email address.");
		return false;
	}else{
		var patt=/^([a-zA-Z.0-9_]+)([@])([a-zA-Z0-9_]+)(\.[a-zA-Z0-9_]+){1,2}$/;
		if(!patt.test(email)){
			alert ("Please provide a valid email address.");
			return false;
		}
	}
		
}
JS
?>
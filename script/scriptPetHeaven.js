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
		var alongCat = document.getElementById("alongCat").checked;
		var alongnone = document.getElementById("alongNone").checked;
		if (!alongDogs&&!alongCat&&!alongnone){
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
	
	var dogAlong = document.getElementById('alongDog').checked;
	var catAlong = document.getElementById('alongCat').checked;
	var noneAlong = document.getElementById('alongNone').checked;
	if (!dogAlong && !catAlong && !noneAlong){
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

function signup(){
	var userName = document.getElementById("userN").value;
	var newP = document.getElementById("newP").value;
	var confirmP = document.getElementById("cPass").value;
	var result = veriUserPass(userName,newP);
	if (!result){
		return false;
	}else if (newP!=confirmP){
		alert ("Passwords do not match. Please try again.");
		return false;
	} 
}

function veriUserPass(user, pass){
	var patternUN = /^[A-Za-z0-9]+$/;
	if (!patternUN.test(user)){
		alert ("Please enter a valid user name \nwith only digits and letters.");
		return false;
	}
	if (pass.length<4){
		alert ("Please enter a password with more than 4 characters.");
		return false;
	}else{
		var patternW = /[A-Za-z]+/g;
		if (!patternW.test(pass)){
			alert ("Please enter a password with at least a letter.");
			return false;
		}
		patternW = /[0-9]+/g;
		if (!patternW.test(pass)){
			alert ("Please enter a password with at least a digit.");
			return false;
		}
	}
	return true;
}

function login(){
	var userN = document.getElementById("userN").value;
	var password = document.getElementById("passW").value;
	if (!veriUserPass(userN,password))
		return false;
}

function unchecknone(){
	document.getElementById("alongNone").checked = false;
}

function uncheckalongs(){
	document.getElementById("alongDog").checked = false;
	document.getElementById("alongCat").checked = false;
}

function enabledog(){
	document.getElementById("dogBreed").disabled=false;
	document.getElementById("catBreed").disabled=true;
	document.getElementById("dogAge").disabled=false;
	document.getElementById("catAge").disabled=true;
}

function enablecat(){
	document.getElementById("dogBreed").disabled=true;
	document.getElementById("catBreed").disabled=false;
	document.getElementById("dogAge").disabled=true;
	document.getElementById("catAge").disabled=false;
}

function contact(){
	alert ("Please contact the owner's with the contact details provided.");
}
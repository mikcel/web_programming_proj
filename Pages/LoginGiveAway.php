<?php
	if (isset($_COOKIE['PHPSESSID'])){
		header('Location: GiveAway.php');
	}else if (isset($_POST['submit'])){
		$fName = fopen("../textFile/login.txt","r") or die("Unable to open file. Contact Admin.");
		$continueLoop = true;
		while (($line = trim(fgets($fName)))!="" && $continueLoop){
			$login = explode(":",$line);
			if ($login[0]==$_POST['user'] && $login[1]==$_POST['pass']){
				$continueLoop=false;
			}
		}
		fclose($fName);
		if (!$continueLoop){
			session_id(md5(time().rand(0,130).$_SERVER['REMOTE_ADDR']));
			session_start();
			$_SESSION['username']=$_POST['user'];
			header("Location: GiveAway.php");
		}else{
			$error = "Failed Login. Please try again.";
		}
	}
	include ("headerPetHeaven.inc");
?>
<section id="login">
	<h2>Login Page</h2><br/>
	<div>
		You will have to login first before giving a pet away.<br/><br/>
	</div>		
	<form onsubmit="return login()" method="post">
		<table>
			<tr>
				<td><label>User Name: </label></td>
				<td class="text"><input type="text" size="20" name="user" id="userN" required/></td>
			</tr>		
			<tr>
				<td><label>Password: </label></td>
				<td class="text"><input type="password" size="20" name="pass" id="passW" required/></td>
			</tr>		
			<tr class="buttons">
				<td colspan="2">
					<button type="submit" name ="submit" value="Login">Login</button>&emsp;
					<button type="reset" value="Clear Form">Clear Form</button>
				</td>
			</tr>
		</table>	
		<div class="error">
			<?php
				if (isset($error))
					echo $error;
			?>
		</div>	
	</form>
</section>
<?php
	include("footerPetHeaven.inc");
?>
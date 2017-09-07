<?php
	if (isset($_POST['submit'])){
		$fname = fopen("../textFile/login.txt","r") or die ("Error opening file. Contact Admin");
		$continue = true;
		$checkUName = strpos(file_get_contents("../textFile/login.txt"),$_POST['user']);
		if ($checkUName!==false){
			$Error = "User Name already exists.";
		}else{
			$fname = fopen("../textFile/login.txt","a+") or die ("Error opening file. Contact Admin");
			$user = trim($_POST['user']);
			$pass = trim($_POST['pass']);
			$write = fwrite($fname,"$user:$pass\n");
			if ($write)
				$Registered = "You are now registered. Login whenever you wish.";			
		}
		fclose($fname);
		$_POST['submit']="";
	}else{
		$Register="";
		$Error="";
	}
	include ("headerPetHeaven.inc");
?>
<section id="createAccount">
	<h2>Create an Account</h2><br/>
	<div class="specs">
		Create your free account to adopt a new pet or give a pet away.<br/><br/>
			<img src="../images/warning.gif" alt="warning" class="image"/> <!--http://clipperbladesharpening.webstarts.com/uploads/dog_raising_hand_or_pointing_up.gif-->
			The <span class="emph"> User Name </span>must contain only letters and digits.<br/>
			The <span class="emph"> Password </span> must be:
			<ul>
				<li>at least 4 characters long</li>
				<li>made of only letters and digits</li>
				<li>must have at least one letter</li>
				<li>must have at least one digit</li>
			</ul>
	</div>
	<form onsubmit="return signup()" method="post">
		<table>
			<tr>
				<td><label>User Name: </label></td>
				<td class="text"><input type="text" size="20" name="user" id="userN" required/>
					
				</td>
			</tr>		
			<tr>
				<td><label>Password: </label></td>
				<td class="text"><input type="password" size="20" name="pass" id="newP" required/></td>
			</tr>		
			<tr>
				<td><label>Confirm Password: </label></td>
				<td class="text"><input type="password" size="20" name="cPass" id="cPass" required/></td>
			</tr>
			<tr class="buttons">
				<td colspan="2">
					<button type="submit" name ="submit" value="Sign Up">Sign Up</button>&emsp;
					<button type="reset" value="Clear Form">Clear Form</button>

				</td>
			</tr>
		</table>	
		<div class="Register">
			<?php
				if(isset($Registered)){
					echo "$Registered";	
				}else{
					echo "";
				}
			?>
		</div>			
		<div class="error">
		<?php 
				if (isset($Error)){
					echo "$Error";
				}else{
					echo "";
				}
			?>
		
		</div>	
	</form>
</section>
<?php
	include ("footerPetHeaven.inc");
?>
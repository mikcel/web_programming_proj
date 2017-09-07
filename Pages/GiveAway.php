<?php
	if (isset($_POST['submit'])){
		$fName = fopen("../textFile/availablePetInfo.txt","r") or die ("Unable to open file. Contact Admin.");

		while(($str = fgets($fName))!==false){
			$line = $str;
		}

		if ($line==false)
			$count=0;
		else{
			$lastPet = explode(":",$line);
			$count = $lastPet[0];
			$count +=1;
		}
		fclose($fName);
		
		$fName = fopen("../textFile/availablePetInfo.txt","a") or die ("Unable to write to file.");
		session_start();
		$strtoWrite = ($count).":".$_SESSION['username'].":".$_POST['pet'].":";
		if ($_POST['pet']=="dog"){
			$strtoWrite .=$_POST['dogBreed'].":".$_POST['dogAge'].":";
		}else if ($_POST['pet']=="cat"){
			$strtoWrite .=$_POST['catBreed'].":".$_POST['catAge'].":";
		}
		$strtoWrite .= $_POST['gender'].":";
		if (isset($_POST['alongdog'])){
			$strtoWrite .= $_POST['alongdog'].":";
		}else{
			$strtoWrite .= "no:";
		}	
		if (isset($_POST['alongcat'])){
			$strtoWrite .= $_POST['alongcat'].":";
		}else{
			$strtoWrite .= "no:";
		}		
		if (isset($_POST['none'])){
			$strtoWrite .= $_POST['none'].":";
		}else{
			$strtoWrite .= "no:";
		}		
		if (isset($_POST['alongchild'])){
			$strtoWrite .= $_POST['alongchild'].":";
		}else{
			$strtoWrite .= "no:";
		}
		$descp = str_replace("\n",". ",$_POST['detailsanimal']);
		$strtoWrite .= $descp.":";
		$strtoWrite .= $_POST['ownername'].":".$_POST['ownergiven'].":".$_POST['owneremail']."\n";
		fwrite($fName, $strtoWrite);
		fclose($fName);
		
		$message = "Pet Registered. You will be contacted when someone wants your pet. Thank you.<br/><br/>";
	}
	include ("headerPetHeaven.inc");

?>	
<section id="giveaway">
	<h1>Give a pet</h1>
	<form onsubmit="return checkGiveAway()" method="post">
		<div id="imgHand"><!--http://www.petful.com/wp-content/uploads/2011/08/14995933929_c073daa47b_k.jpg--></p></div>
		<div id="message">
		<?php
			if (isset($message))
				echo $message;
		?>
		</div>
		<fieldset>
			<legend>Pet's Details</legend>
			<label>Choose your pet:</label>&nbsp;
			<label><input type="radio" name="pet" value="dog" id="dogpet" onclick="enabledog()"/> Dog</label>
			<label><input type="radio" name="pet" value="cat" id="catpet"onclick="enablecat()"/> Cat</label><br />
			<br />
			<label>Breed </label><br/>
			<label>Dog:&nbsp;
				<select name="dogBreed" id="dogBreed" disabled="true">
					<option value="Beagle">Beagle</option>
					<option value="Boxer">Boxer</option>
					<option value="Bulldog">Bulldog</option>
					<option value="Cavalier King Charles Spaniel">Cavalier King Charles Spaniel</option>
					<option value="Chihuahua">Chihuahua</option>
					<option value="Dachhund">Dachhund</option>
					<option value="Dalmatian">Dalmatian</option>
					<option value="German Shepherd">German Shepherd</option>
					<option value="German Shorthaired Pointer">German Shorthaired Pointer</option>
					<option value="Golden Retriever">Golden Retriever</option>
					<option value="Labrador Retriever">Labrador Retriever</option>
					<option value="Poodle">Poodle</option>
					<option value="Rottweiler">Rottweiler</option>
					<option value="Siberian Huskie">Siberian Huskie</option>
					<option value="Yorkshire Terriers">Yorkshire Terriers</option>
					<option value="Mix" selected>Mix</option>
				</select>
			</label>&nbsp;
			<label>Cat:&nbsp;
			<select name="catBreed" id="catBreed" disabled="true">
				<option value="Abyssinian">Abyssinian</option>
				<option value="American Shorthair">American Shorthair</option>
				<option value="Birman">Birman</option>
				<option value="Exotic">Exotic</option>
				<option value="Maine Coon">Maine Coon</option>
				<option value="Oriental">Oriental</option>
				<option value="Persian">Persian</option>
				<option value="Ragdoll">Ragdoll</option>
				<option value="Siamese">Siamese</option>
				<option value="Sphynx">Sphynx</option>
				<option value="Mix" selected>Mix</option>
			</select>
			</label><br /><br />
			<label>Age </label><br/>
			<label>Dog:&nbsp;
				<select name="dogAge" id="dogAge" disabled>
					<option value ="Puppy - 0-12 mths">Puppy: 0-12 months</option>
					<option value="Adolescent - 1-2 yrs">Adolescent: 1-2 years</option>
					<option value="Adult - 2-7 yrs">Adult: 2-7 years</option>
					<option value="Senior - 7-14 yrs">Senior: 7-14 years</option>
					<option value="Geriatric - 14+ yrs">Geriatric: 14+ years</option>
				</select>	
			</label>&nbsp;
			<label>Cat:&nbsp;
				<select name="catAge" id="catAge" disabled="true">
					<option value="Kitten - 0-1 yr">Kitten: 0-1 year</option>
					<option value="Teen - 2-4 yrs">Teen: 2-4 years</option>
					<option value="Adult - 4-6 yrs">Adult: 4-6 years</option>
					<option value="Senior - 7+ yrs">Senior: 7+ years</option>
				</select>
			</label><br /><br />
			<label>Gender:</label>
			<label><input type="radio" name="gender" value="male" id="petmale"/> Male</label>
			<label><input type="radio" name="gender" value="female" id="petfem" /> Female</label>
			<br /><br />
			<label>Gets Along with:</label>
			<label><input type="checkbox" name="alongdog" value="alongdog" id="alongDog" onclick="unchecknone()"/> Other dogs</label>
			<label><input type="checkbox" name="alongcat" value="alongcat" id="alongCat" onclick="unchecknone()"/> Other cats</label>
			<label><input type="checkbox" name="none" value="alongnone" id="alongNone" onclick="uncheckalongs()"/> None</label>
			<br /><br />
			<label><input type="checkbox" name="alongchild" value="alongchild"/>&nbsp;Suitable for a family with small children</label><br /><br />
			<label>Give more details of pet putting for adoption: <br /><textarea name="detailsanimal" id="detailsanimal"></textarea></label><br />
		</fieldset><br />
		<fieldset>
			<legend>Owner's details</legend>
			<label>Owner's Family Name: &nbsp;<input type="text" name="ownername" id="familyname"/></label><br/><br/>
			<label>Owner's Given name: &nbsp;<input type="text" name="ownergiven" id="givenname"/></label><br /><br />
			<label>Owner's Email: &nbsp;<input type="text" name="owneremail" id="email"/></label><br />
		</fieldset><br />
		<input type="submit" value="Submit" name="submit"/>
		<input type="reset" value="Clear Form"/><br /><br />
	</form>
</section>
<?php
	include("footerPetHeaven.inc");
?>
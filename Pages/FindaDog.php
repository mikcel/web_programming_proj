<?php
	if (isset($_POST['submit'])){
		session_id(md5("finddog".time().rand().$_SERVER['REMOTE_ADDR']));
		session_start();
		$_SESSION['pet']="dog";
		$_SESSION['breed']=$_POST['breed'];
		$_SESSION['age']=$_POST['age'];
		$_SESSION['gender']=$_POST['gender'];
		if (isset($_POST['alongdog'])){
			$_SESSION['alongdog']=$_POST['alongdog'];
		}else{
			$_SESSION['alongdog']="no";
		}	
		if (isset($_POST['alongcat'])){
			$_SESSION['alongcat']=$_POST['alongcat'];
		}else{
			$_SESSION['alongcat']="no";
		}		
		if (isset($_POST['alongchild'])){
			$_SESSION['alongchild']=$_POST['alongchild'];
		}else{
			$_SESSION['alongchild']="no";
		}
		if (isset($_POST['alongnone'])){
			$_SESSION['alongnone']=$_POST['alongnone'];
		}else{
			$_SESSION['alongnone']="no";
		}
		header("Location: browsePet.php");
	}else{
		include ("headerPetHeaven.inc");
	}
?>
<section id="dog">
	<h3>Find your ideal dog to adopt</h3>
	<div class="explain">
		<p>The step by step process to find your perfect best friend starts here!!
		Gather all your information and tell us which dog you want in terms of breed, age, gender and easygoing.
		Start your search -->
		<br />
		</p><br />
	</div>
	<div class="petsearch">
		<form onsubmit="return checkForm('dog')" method="post">
			<label>Complete your search option below to get you going.<br />
				<span class="italic">Tip: Be the more specific you can for a perfect match.</span></label><br /><br />
			<label>Breed: 
				<select name="breed">
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
					<option value="Mix">Mix</option>
					<option value="Poodle">Poodle</option>
					<option value="Rottweiler">Rottweiler</option>
					<option value="Siberian Huskie">Siberian Huskie</option>
					<option value="Yorkshire Terriers">Yorkshire Terriers</option>
					<option value="breednotmatter" selected>Does not matter</option>
				</select>
			</label><br /><br />
			<label>Preferred age of dog: 
				<select name="age">
					<option value ="Puppy - 0-12 mths">Puppy: 0-12 months</option>
					<option value="Adolescent - 1-2 yrs">Adolescent: 1-2 years</option>
					<option value="Adult - 2-7 yrs">Adult: 2-7 years</option>
					<option value="Senior - 7-14 yrs">Senior: 7-14 years</option>
					<option value="Geriatric - 14+ yrs">Geriatric: 14+ years</option>
					<option value="agenotmatter" selected>Does not matter</option>
				</select>
			</label><br /><br />
			<label>Gender <br /></label>
			<label>&nbsp;<input type="radio" name="gender" value="male"/> Male</label>
			<label><input type="radio" name="gender" value="female"/> Female</label>
			<label><input type="radio" name="gender" value="gendnotmatter"/> Does not matter</label><br /><br />
			<label>Gets Along with</label><br />
			<label>&nbsp;<input type="checkbox" name="alongdog" value="alongdog" id="alongDog" onclick="unchecknone()"/> Other Dogs</label>
			<label>&nbsp;<input type="checkbox" name="alongcat" value="alongcat" id="alongCat" onclick="unchecknone()"/> Cats</label>
			<label>&nbsp;<input type="checkbox" name="alongnone" value="alongnone" id="alongNone" onclick="uncheckalongs()"/> None</label><br />
			<label>&nbsp;<input type="checkbox" name="alongchild" value="alongchild" id="alongChild"/> Small Children</label><br /><br />
			<input type="submit" name ="submit" value="Submit"/>
			<input type="reset" value="Clear Form"/>
		</form>
	</div>
</section>
<?php
	include ("footerPetHeaven.inc");
?>
<?php
	if (isset($_POST['submit'])){
		session_id(md5("findcat".time().rand().$_SERVER['REMOTE_ADDR']));
		session_start();
		$_SESSION['pet']="cat";
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
<section id="cat">
	<h3>Find the ideal cat to adopt</h3>
	<div class="explain">
		<p>The step by step process to find your perfect best friend starts here!!
		Gather all your information and tell us which cat you want in terms of breed, age, gender and easygoing.
		Start your search --></p></div>
	<div class="petsearch">
		<form onsubmit = "return checkForm('cat')" method="post">
			<label>Complete your search option below to get you going.<br />
				<span class="italic">Tip: Be the more specific you can for a perfect match.</span></label><br /><br />
			<label>Breed: 
				<select name="breed">
					<option value="Abyssinian">Abyssinian</option>
					<option value="American Shorthair">American Shorthair</option>
					<option value="Birman">Birman</option>
					<option value="Exotic">Exotic</option>
					<option value="Maine Coon">Maine Coon</option>
					<option value="Mix">Mix</option>
					<option value="Oriental">Oriental</option>
					<option value="Persian">Persian</option>
					<option value="Ragdoll">Ragdoll</option>
					<option value="Siamese">Siamese</option>
					<option value="Sphynx">Sphynx</option>
					<option value="breednotmatter" selected>Does not matter</option>
				</select>
			</label><br /><br />
			<label>Preferred age of cat: 
				<select name="age">
					<option value="Kitten - 0-1 yr">Kitten: 0-1 yr</option>
					<option value="Teen - 2-4 yrs">Teen: 2-4 yrs</option>
					<option value="Adult - 4-6 yrs">Adult: 4-6 yrs</option>
					<option value="Senior - 7+ yrs">Senior: 7+ yrs</option>
					<option value="agenotmatter" selected>Does not matter</option>
				</select>
			</label><br /><br />
			<label>Gender <br /></label>
			<label>&nbsp;<input type="radio" name="gender" value="male"/> Male</label>
			<label><input type="radio" name="gender" value="female"/> Female</label>
			<label><input type="radio" name="gender" value="gendnotmatter"/> Does not matter</label><br /><br />
			<label>Gets Along with</label><br />
			<label>&nbsp;<input type="checkbox" name="alongcat" value="alongcat" id="alongCat" onclick="unchecknone()"/> Other Cats</label>
			<label>&nbsp;<input type="checkbox" name="alongdog" value="alongdog" id="alongDog" onclick="unchecknone()"/> Dogs</label>
			<label>&nbsp;<input type="checkbox" name="alongnone" value="alongnone" id="alongNone" onclick="uncheckalongs()"/> None</label><br />
			<label>&nbsp;<input type="checkbox" name="alongchild" value="alongchild" id="alongChild"/> Small Children</label><br /><br />
			<input type="submit" name="submit" value="Submit"/>
			<input type="reset" name="reset" value="Clear Form"/>
		</form>
	</div>
</section>
<?php
	include("footerPetHeaven.inc");
?>
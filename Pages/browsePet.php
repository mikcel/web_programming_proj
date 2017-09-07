<?php
	session_start();
	setcookie('PHPSESSID','',time()-3,'/');
	include ("headerPetHeaven.inc");
?>	
<section id="browsePet">
	<h1 id="top">Browse for pets. Go find your new friend!</h1>
	<?php
		$fName = fopen("../textFile/availablePetInfo.txt","r") or die ("Unable to open file. Contact Admin.");
		$count=0;
		while(($line=fgets($fName))!==false){
			$petInfo = explode(":",$line);
			$continue=true;
			if ($petInfo[2]==$_SESSION['pet']){
				$breed = $_SESSION['breed'];
				if ($breed!="breednotmatter" && $petInfo[3]!=$breed){
					$continue = false;
				}
				
				$age = $_SESSION['age'];
				if ($age!="agenotmatter" && $petInfo[4]!=$age){
					$continue = false;
				}
				
				$gender = $_SESSION['gender'];
				if ($gender!="gendnotmatter" && $petInfo[5]!=$gender){
					$continue = false;
				}
				
				if ($_SESSION['alongnone']!=$petInfo[8]){
					$continue=false;
				}
				
				if ($_SESSION['alongdog']!=$petInfo[6] && $_SESSION['alongcat']!=$petInfo[7]){
					$continue=false;
				}
					
				if ($petInfo[9]!=$_SESSION['alongchild']){
					$continue=false;
				}
				
				if ($continue){
					if ($_SESSION['alongdog']=="alongdog"){
						$petInfo[6]="Yes";
					}
					if ($_SESSION['alongcat']=="alongcat"){
						$petInfo[7]="Yes";
					}
					if ($_SESSION['alongchild']=="alongchild"){
						$petInfo[9]="Yes";
					}
					$count+=1;
					echo "<table class=\"details\">
								<tr>
									<td><span class=\"infoB\">Pet:</span> ".ucfirst($petInfo[2])."</td>
									<td><span class=\"infoB\">Breed:</span> ".$petInfo[3]."</td>
									<td><span class=\"infoB\">Age:</span> ".$petInfo[4]."</td>
									<td><span class=\"infoB\">Gender:</span> ".ucfirst($petInfo[5])."</td>
								</tr>
								<tr>
									<td><span class=\"infoB\">Gets Along With</span></td>
									<td><span class=\"infoB\">Other Dogs:</span> ".ucwords($petInfo[6])."</td>
									<td><span class=\"infoB\">Other Cats:</span> ".ucwords($petInfo[7])."</td>
									<td><span class=\"infoB\">Small Children:</span> ".ucwords($petInfo[9])."</td>
								</tr>
								<tr>
									<td colspan=\"2\" rowspan=\"3\" class=\"more\">
									<span class=\"infoB\">More Details:</span><br/>
									".ucfirst($petInfo[10])."
									</td>
									<td colspan=\"2\"><span class=\"infoB\">Owner's Name:</span> ".ucfirst($petInfo[11])." ".ucfirst($petInfo[12])."</td>
								</tr>
								<tr>
									<td colspan=\"2\"><span class=\"infoB\">Owner's E-mail:</span> ".$petInfo[13]."</td>
								</tr>
								<tr>
									<td colspan=\"2\">
									<button class=\"interested\" onclick=\"contact()\"><span class=\"infoB\">Interested</span></button>
									</td>
								</tr>
					</table>";
				}	
			}
		}
		if ($count==0){
			echo "We are sorry. No match was found. ";
				if ($_SESSION['pet']==="dog"){
					echo "<a href=\"FindaDog.php\">Try Again.</a>";
				}else{
					echo "<a href=\"FindaCat.php\">Try Again.</a>";
				}
		}else{
			if ($_SESSION['pet']=='dog'){
				echo "<span class=\"new\"><a href=\"FindaDog.php\">Make a new search</a></span><span class=\"top\"><a href=\"#top\">Top of Page</a></span><br/><br/>";
			}else{
				echo "<span class=\"new\"><a href=\"FindaCat.php\">Make a new search</a></span><span class=\"top\"><a href=\"#top\">Top of Page</a></span><br/><br/>";
			}
		}
		$_SESSION=array();
		session_destroy();
	?>
</section>
<?php
	include("footerPetHeaven.inc");
?>
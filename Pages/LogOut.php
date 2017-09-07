<?php
	if (isset($_COOKIE['PHPSESSID'])){
		session_start();
		$_SESSION=array();
		setcookie('PHPSESSID','',time()-3,'/');
		session_destroy();
		$message="Log out Successfully. <br/> Thank you for your collaboration.";
	}else{
		$message="You have not logged in before. Log out Failed.";
	}
	include ("headerPetHeaven.inc");
?>	
<section id="logout">
	<h2>Log Out Page</h2>
	<p>
		<?php 
			echo $message;
		?>
	</p>
</section>
<?php
	include("footerPetHeaven.inc");
?>
<?php   session_start(); ?>

<!DOCTYPE html>
<html>
	<head><link rel="shortcut icon" href="CSS/binscri.png" />
		<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/Bandeaux.css" />
		<link rel="stylesheet" href="CSS/connexion.css" />
		<title>In'N'Out - Connexion</title>
	</head>
	
	<body>
		
		<?php
			if (isset($_SESSION['Pseudo'])){
		 		include("bsupco.php");
		 	}
		 	else { include("bsup.php");}
		 ?>

		<br/><br/><br/><br/>
			<form method="post">
		<div id="container">
	    	<h2>Renseignez votre identifiant, votre mot de passe</h2>
	    	<br/><br/>

			<div id="cobuttons">
				<input type="text" name="Identifiant" placeholder="Pseudo" class="chco" >
				<input type="password" name="mot_de_passe" placeholder="Mot de passe" class="chmdp" >
			</div>
			<input type="submit" name="connexion"  id="connexion" value=" Connexion " action="accueil.php">
		</form>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<p> Et accédez à l'ensemble de nos évènements !! </p>
		</div>
		<?php
		    $connect = mysqli_connect("localhost", "root", "root", "In_n_out");
		    if (!$connect) 
		    {
		            printf("échec de la connexion : s\n", mysqli_connect_error());
		            exit();
		        }
		    $mot_de_passe=$_POST['mot_de_passe'];
		    $identifiant=$_POST['Identifiant'];
		    $result = mysqli_query($connect, "SELECT * FROM users WHERE Pseudo='$identifiant'") or die("MySQL Erreur : " . mysqli_error());
		    $users=mysqli_fetch_assoc($result);
		    $password=$users['Password'];
		    if (isset($_POST['mot_de_passe']) AND $mot_de_passe == $password)
		    {

		      $_SESSION['id']= $users['id'];
		      $_SESSION['Pseudo']=$users['Pseudo'];
		      /*header('location: http://localhost:8888/www/accueil.php');*/
		      echo "Bienvenue! Si vous n'êtes pas redirigés vers la page d'accueil, merci de cliquer ici:" ?>
		    <a href="accueil.php">lien</a>
		    <?php
		    }
		    elseif (isset($_POST['mot_de_passe']))
		    {
		      header('location: connexion.php');
		      session_destroy();
		      echo "Identifiant/ Mot de passe eronné";
		    }
		?>


	<?php include ('binf.php'); ?>
    </body>
</html>







				

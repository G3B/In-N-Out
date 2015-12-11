<?php
	require 'model_recherche_avancee.php'
?>

<!DOCTYPE html>

<html>
    <head>
    	<meta charset="utf-8">
        <title>Recherche avancée</title>
        <link rel="stylesheet" href="style_recherche_avancee.css" >
    </head>

    <body>

    	<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		

    	<div class="container">

    			<!-- début barre de recherche --> 

    		<form method="post" id="barre_recherche">
    			
    			<input type="text" name="nom_evenement" placeholder="nom">

	    		<select name="categorie" id="categorie">
	    		<option value="null" >Tout</option>
	    			<?php
						$categorie = importe_categorie();
							while ($categorie_event = mysqli_fetch_assoc($categorie)){ 
								$cat = $categorie_event['nom'];
								$id_cat = $categorie_event['id_categorie']; ?>
								<option value="<?php echo $id_cat ?>" ><?php echo $cat ?></option>
							<?php }
	    			?>
				</select>

				<select name="prix">
					<option value=">=0">Prix</option>
					<option value=">0">Payant</option>
					<option value="=0">Gratuit</option>
				</select>

				<input type="text" name="lieu" placeholder="lieu">

				<input type="date" name="date">

				Trier par :
				<select name="tri">
					<option value="prix">prix</option>
					<option value="popularité">popularité</option>
					<option value="date">date</option>
					<option value="notation">notation</option>
					<option value="nombre de places restantes">places restantes</option>
					<option value="nombre de participants">nb de participants</option>
					<option value="distance">distance</option>
				</select>

				<input type="submit" id="bouton_valider">

    		</form>

    			<!-- fin barre de recherche -->


			<br/>
			<br/>

			
				<!-- début résultats -->

			

			<?php

				if (isset($_POST["nom_evenement"]) or isset($_POST["lieu"]) or isset($_POST["categorie"]) or isset($_POST["prix"])) {
				
					$result = rechercher_bd($_POST["nom_evenement"],$_POST["lieu"],$_POST["categorie"]);

					while ($event = mysqli_fetch_assoc($result)) { ?>

						<?php
							$nom_event = $event['nom'];
							$lien = "..\Images\\".$nom_event."\\".$nom_event."_cover.jpg";
						?>
					
						<div class="block_evenement">

							<img src="<?php echo $lien; ?>" alt="illustration" class="taille_des_illustrations">

							<br/>	<?php echo $event['nom'] ?>
							<br/>	<?php echo $event['prix'] ?> Euros
							<br/>	<?php echo categorie($event['nom']) ?>
							<br/>	<?php echo $event['adresse'] ?>
							<br/>
							<br/>
							<br/>
							<br/>

							<?php
								$nom_transfert = $event['nom'];
								$id_de_event = $event['id_event'];
								$nom_event = $event['nom'];
								$id_event = $event['id_event'];
							?>
							<a href="../Consultation/page_consultation.php?transfert=<?php echo $nom_transfert; ?>"><button id="bouton_page_evenement">Page de l'évènement</button></a>
							
							<?php echo (bouton_participation($nom_event,$id_event)); ?>

						</div>

					<?php }

				}
				else {
					$result = rechercher_bd_tout();

					while ($event = mysqli_fetch_assoc($result)) { ?>

						<?php
							$nom_event = $event['nom'];
							$id_event = $event['id_event'];
							$lien = "..\Images\\".$nom_event."\\".$nom_event."_cover.jpg";
						?>
					
						<div class="block_evenement">

							<img src="<?php echo $lien; ?>" alt="illustration" class="taille_des_illustrations">

							<br/>	<?php echo $event['nom'] ?>
							<br/>	<?php echo $event['prix'] ?> Euros
							<br/>	
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<?php
								$nom_transfert = $event['nom'];
								$id_de_event = $event['id_event']
							?>
							<a href="../Consultation/page_consultation.php?transfert=<?php echo $nom_transfert; ?>"><button id="bouton_page_evenement">Page de l'évènement</button></a>
							
							<?php echo (bouton_participation($nom_event,$id_event)); ?>

						</div>

					<?php }
				}


			?>

			<br/><br/>

			<?php
				$result = mysqli_query($connect, "SELECT Nom FROM events NATURAL JOIN participation WHERE id_user = 3") or die("MySQL Erreur : " . mysqli_error());

					while ($event = mysqli_fetch_assoc($result)) { ?>

						<br/><?php echo $event['Nom']; ?>

					<?php }


			?>



			

    	</div>

    </body>
</html>

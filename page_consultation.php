<?php require 'model_consultation.php' ?>

<?php
	$transfert = $_GET['transfert'];
	$event = creation_event_tableau($transfert);
	if (!isset($event)) {
		echo "<h1>Evènement non trouvé</h1>";
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Soirée d'intégration ISEP</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style_consultation.css" />
	</head>

	<body>

		<div id="container">

			<br/><br/>
			
			<a href="..\Recherche_avancee\page_recherche_avancee.php"><button>Recherche Avancée</button></a>

			<br/><br/><br/><br/>

			<div class="block_lateraux_gauche">
				
				<div class="blocks_photos">


					<?php
						$nom_event = $event['nom'];
						$lien = "..\images\\".$nom_event."\\".$nom_event."_cover.jpg";
					?>

					<img src="<?php echo $lien; ?>" class="image_block_lateral">
					<img src="<?php echo $lien; ?>" class="image_block_lateral">
					<img src="<?php echo $lien; ?>" class="image_block_lateral">
					<img src="<?php echo $lien; ?>" class="image_block_lateral">

				</div>

				<br/>

				<div class="blocks">
					
					<div class="titre_block">Evenements à venir</div>

					</br>

					Anniversaire de Lucas<br/>
					Soirée de Camille<br/>
					Concert de Beyoncé<br/>
					Urbanfoot<br/>

				</div>

			</div>

			<div class="block_lateraux_droite">

				<div class="blocks">
					<div class="titre_block">Informations</div>

					<br/>Prix : <div class="couleur_info"><?php echo $event['prix']; ?> Euros</div>
					<br/>Nombre de participants : <div class="couleur_info"><?php echo $event['nb_participants']; ?> personnes</div>
					<br/>Sponsors : <div class="couleur_info"><?php echo $event['sponsors']; ?></div>
					<br/><?php echo lien_site($event['site']); ?>
					<br/>Departement : <div class="couleur_info"><?php echo $event['departement']; ?></div>
					<br/>Commune : <div class="couleur_info"><?php echo $event['commune']; ?></div>
					<br/>Adresse : <div class="couleur_info"><?php echo $event['adresse']; ?></div>
					<br/>Catégorie : <div class="couleur_info"><?php echo categorie($event['nom']); ?></div>
				</div>

				<br/>

				<div class="blocks">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.6778937649337!2d2.3258453158813843!3d48.84528240958335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671ce3fa0c01f%3A0x9bd1ac22c478d56e!2sI.S.E.P+Institut+Sup%C3%A9rieur+d&#39;Electronique+de+Paris!5e0!3m2!1sfr!2sfr!4v1448999279104" width="300" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>

			</div>

			<div id="block_centrale">

				<div class="big_titre"><?php echo $event['nom'] ?></div>

				<br/>

				<?php
					$nom_event = $event['nom'];
					$id_event = $event['id_event'];
					$lien = "..\images\\".$nom_event."\\".$nom_event."_cover.jpg";
				?>

				<img src="<?php echo $lien; ?>" id="illustration_center">

				<div id="bouton_rating">
					<div class="rating"><a href="#5" title="Donner 5 étoiles">☆</a><a href="#4" title="Donner 4 étoiles">☆</a><a href="#3" title="Donner 3 étoiles">☆</a><a href="#2" title="Donner 2 étoiles">☆</a><a href="#1" title="Donner 1 étoile">☆</a></div>

					<div id="position_bouton_participer">
						<?php echo (bouton_participation($nom_event,$id_event)); ?>
					</div>
	
				</div>

				<div class="titre_block">Description :</div><br/>
				
				<?php echo $event['description'] ?>
				
			</div>

		</div>

	</body>
</html>

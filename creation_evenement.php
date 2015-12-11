<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>Création d'un évènement</title>
	</head>
	
	<body>
	 <?php
        $connect = mysqli_connect("localhost", "root", "", "in_n_out");
        if (!$connect) {
            printf("Echec de la connexion : %s\n", mysqli_connect_error());
            exit();
        }
        ?>



		<div id="container">

			<div id="block_input">

				<form method="post">

					<div id="block_gauche">

						<div id="infos_evenement">
							
								<h1>Infos évènement</h1>
								<p>
									<h3><label for="nom">Nom * </label>: <input type="text" name="nom" placeholder="nom de votre évènement" required/></h3>
									<label for="Photo de l'évènement">Ajouter une illustration</label>
									<input type="file" name="img" >
									<br></br>	
								</p>
								<p><h3>
									<p>
										<label for="catégories">Type d'évènement</label><br/>
										<select name="categorie" id="categorie">
							    			<?php
												$categorie = mysqli_query($connect, "SELECT * FROM categorie") or die("MySQL Erreur : " . mysqli_error());
													while ($categorie_event = mysqli_fetch_assoc($categorie)){ 
														$cat = $categorie_event['nom'];
														$id_cat = $categorie_event['id_categorie'];
														?>
														<option value="<?php echo $id_cat ?>"><?php echo $cat ?></option>
													<?php }
							    			?>
										</select>
									</p>						
								</h3></p>						
								Nombre de personnes: <input type="number" name="number" min="0" /><br>
								</h3>	
								</p>
								<p>
									<input type="radio" name="type" value="Gratuit" checked="checked">Gratuit<br>
									<input type="radio" name="type" value="Payant">Payant: <input type="number" name="prix" min="0"/> euros<br>
								</p>
								
								<p>		
									<h3>
										<label for="description">Description</label><br/>
										<textarea name="description" rows="21" cols="80" placeholder="Taper ici votre texte" ></textarea>
									</h3>
									<h3><label for="site_web">Site Web </label>: <input type="text" name="site_web"/></h3>
								</p>
						</div>
					</div>

					<div id="block_droite">

						<div id="infos_lieu">
							
								<legend class="titres"><h1>Infos lieu</h1></legend><br>						
								<p>
									<h3><label for="Adresse">Adresse *</label>: <input type"text" name="Adresse" id="Adresse" placeholder="Adresse" required/></h3>
								</p>
								<p>
									<h3><label for="Commune">Commune *</label>: <input type"text" name="Commune" id="Commune" placeholder="Commune" required/></h3>
									<h3>Code-Postal: <input type="number" name="CodePostal" min="0" placeholder="Code-Postal" required/><br></h3>	
								</p>	
							
						</div>

						<div id="infos_dates_et_horaires">
							
								<legend class="titres"><h1>Infos dates et horaires</h1></legend><br>
								<h3>
								<p>Date *: 
									<input type="date" name="date" placeholder="jj/mm/aa" required/>
								</p>					
								<p>Heure de début *: 
									<input type="time" name="heure_debut" required/>
								</p>
								<p>Durée estimée: 
									<input type="time" name="duree" />
								</p>
								</h3>
						</div>

						<div id="infos_sponsors">
							<legend class="titres"><h1>Infos sponsors</h1></legend><br>
							<h3>
							<p>Sponsor(s): 
								<input type="text" name="sponsor" placeholder="nom des sponsors"/></br></br>
								<label for="Logos_des_sponsors">Logos des sponsors</label>
								<input type="file" name="logo" >
							</p>
							</h3>
						</div>

					</div>
			</div>

				<br/>

				<div id="bouton">
					<input type="submit" value="Valider" class="bouton_style">
					<input type="reset" value="Effacer" class="bouton_style">
					<input type="reset" value="Annuler" class="bouton_style">
				</div>
				
				</form>

		</div>


		<?php

	
			if (isset($_POST['nom'])){
				$nom = $_POST['nom'];
				mysqli_query($connect, "INSERT INTO events(nom) values ('$nom')") or die ("MySQL Erreur : " . mysqli_error());
			}

			
			if (isset($_POST['heure_debut'])){
				$heure_debut = $_POST['heure_debut'];
				mysqli_query($connect, "UPDATE events  SET heure='$heure_debut' WHERE nom='$nom'") or die ("MySQL Erreur : " . mysqli_error());
			}


			if (isset($_POST['date'])){
				$Date = $_POST['date'];
				$newDate = date("Y-m-d", strtotime($Date));
				mysqli_query($connect, "UPDATE events  SET date='$newDate' WHERE nom='$nom'") or die ("MySQL Erreur : " . mysqli_error());
			}

			if (isset($_POST['number'])){
				$nombre = $_POST['number'];
				mysqli_query($connect, "UPDATE events  SET nb_participants='$nombre' WHERE nom='$nom'") or die ("MySQL Erreur : " . mysqli_error());
			}

			if (isset($_POST['description'])){
				$description = $_POST['description'];
				mysqli_query($connect, "UPDATE events  SET description='$description' WHERE nom='$nom'") or die ("MySQL Erreur :" . mysqli_error());
			}

			if (isset($_POST['duree'])){
				$duree = $_POST['duree'];
				mysqli_query($connect, "UPDATE events  SET duree='$duree' WHERE nom='$nom'") or die ("MySQL Erreur :" . mysqli_error());
			}

			if (isset($_POST['categories'])){
				$categories = $_POST['categories'];
				mysqli_query($connect, "UPDATE events  SET id_categorie='$categories' WHERE nom='$nom'") or die ("MySQL Erreur :" . mysqli_error());
			}

			if (isset($_POST['site_web'])){
				$siteweb = $_POST['site_web'];
				mysqli_query($connect, "UPDATE events  SET site='$siteweb' WHERE nom='$nom'") or die ("MySQL Erreur :" . mysqli_error());
			}

			if (isset($_POST['sponsor'])){
				$sponsor = $_POST['sponsor'];
				mysqli_query($connect, "UPDATE events  SET sponsors='$sponsor' WHERE nom='$nom'") or die ("MySQL Erreur :" . mysqli_error());
			}

			if (isset($_POST['type']) and isset($_POST['prix']) and $_POST['type'] == 'Gratuit'){
				$gratuité = ($_POST['type']);
				$prix = $_POST['prix'];
				mysqli_query($connect, "UPDATE events  SET prix='0' WHERE nom='$nom'") or die ("MySQL Erreur : " . mysqli_error());
			}

			if (isset($_POST['type']) and isset($_POST['prix']) and $_POST['type'] == 'Payant'){
				$gratuité = ($_POST['type']);
				$prix = $_POST['prix'];
				mysqli_query($connect, "UPDATE events  SET prix='$prix' WHERE nom='$nom'") or die ("MySQL Erreur : " . mysqli_error());
			}




			if (isset($_POST['Commune'])){
				$commune = $_POST['Commune'];
				mysqli_query($connect,"INSERT INTO lieu(commune) values ('$commune')") or die ("MySQL Erreur : " . mysqli_error());
			}

			if (isset($_POST['Adresse'])){
			$adresse = $_POST['Adresse'];
			mysqli_query($connect, "UPDATE lieu SET adresse='$adresse' WHERE commune='$commune'") or die ("MySQL Erreur : " . mysqli_error());
			}

			if (isset($_POST['CodePostal'])){
				$codepostal = $_POST['CodePostal'];
				mysqli_query($connect, "UPDATE lieu SET departement='$codepostal' WHERE commune='$commune'") or die ("MySQL Erreur : " . mysqli_error());
			}



		?>

	</body>
</html>

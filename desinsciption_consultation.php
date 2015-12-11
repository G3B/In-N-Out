<?php

	session_start();

	$connect = mysqli_connect("localhost", "root", "", "in_n_out2");

	if (!$connect){
        printf("échec de la connexion : s\n", mysqli_connect_error());
        exit();
    }

    if (isset($_GET['nom_evenement'])) {
    	$nom_evenement = $_GET['nom_evenement'];
        global $connect;
    	$result = mysqli_query($connect, "SELECT id_event FROM events  WHERE Nom='$nom_evenement'") or die("MySQL Erreur : " . mysqli_error());
    	$event = mysqli_fetch_assoc($result);
    	$id_event = $event['id_event'];
    	mysqli_query($connect, "DELETE FROM participation WHERE id_user = 3 AND id_event = $id_event") or die("MySQL Erreur : " . mysqli_error());
    	header('Location: page_recherche_avancee.php');
    }


    else{
    	echo "<h1>Erreur</h1>";
    }

?>

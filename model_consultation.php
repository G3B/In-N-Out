<?php

    session_start();

	$connect = mysqli_connect("localhost", "root", "", "in_n_out2");

	if (!$connect){
        printf("échec de la connexion : s\n", mysqli_connect_error());
        exit();
    }

    function creation_event_tableau($evenement){
    	global $connect;
		$result = mysqli_query($connect, "SELECT * FROM events NATURAL JOIN lieu WHERE nom='$evenement'") or die("MySQL Erreur : " . mysqli_error());
		$event = mysqli_fetch_assoc($result);
		return($event);
    }

    function categorie($evenement){
        global $connect;
        $result = mysqli_query($connect, "SELECT id_categorie FROM events WHERE nom='$evenement'") or die("MySQL Erreur : " . mysqli_error());
        $event = mysqli_fetch_assoc($result);
        $id_categorie = $event['id_categorie'];
        $result = mysqli_query($connect, "SELECT nom FROM categorie WHERE id_categorie=$id_categorie") or die("MySQL Erreur : " . mysqli_error());
        $event = mysqli_fetch_assoc($result);
        $nom_categorie = $event['nom'];
        return($nom_categorie);
    }

    function lien_site($link) {
        return('Site : <a href="http://www.'.$link.'" target="_blank">'.$link.'</a>');
    }

    function bouton_participation($nom_event,$id_evnt_verif){
        $variable = 0;
        global $connect;
        $result = mysqli_query($connect, "SELECT id_event FROM participation WHERE id_user=3") or die("MySQL Erreur : " . mysqli_error());
        while ($event = mysqli_fetch_assoc($result)) {
            if ($id_evnt_verif == $event['id_event']){
                $variable = 1;
            }
        }

        if ($variable == 0) {
            return("<a href=\"participation_consultation.php?nom_evenement=".$nom_event."\" ><button id=\"bouton_participer\">Participer</button></a>");
        }

        else{
            return("<a href=\"desinsciption_consultation.php?nom_evenement=".$nom_event."\" ><button id=\"bouton_se_desinscrir\">Se désinscrire</button></a>");
        }
    }


?>

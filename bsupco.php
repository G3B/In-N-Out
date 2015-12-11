		<DOCTYPE!>
		<header>
			<a href="accueil.php"><img src="Images/final2.png" title="In'N'Out" alt="IN'N'Out"/></a>
			
			<a href="deco.php"> <img src="Images/red.png" title="Profil" alt="profil" class="profil2"></a>
			<a href="pro2.php"> <img src="Images/planner8.png" title="Calendrier" alt="calendrier" class= "calendrier"></a>	
			<div class="gcrev">
				<a href="pro2.php"><button class="grev">Gérer mes évenements</button></a>
				<a href="creation_evenement.php"><button class="crev">Créer un évènement</button></a>
			</div>

			<a href="connexion.php"> <img src="Images/comm4.png" title="Forum" alt="forum" class="forum"></a>
			<form method="get" action="recherche_rap.php">
				<input type="text" name="user_search" placeholder="Recherche" class="recherche" >
				<input type="submit" value="S" class="s" >
			</from>
			<a href="page_recherche_avancee.php"> <img src="Images/search2.png" title="Recherche avancée" alt="rechercher un event" class="ra"></a>


			<div id="hero"> <?php echo $_SESSION['Pseudo']; ?> </div>

			
			
		</header>

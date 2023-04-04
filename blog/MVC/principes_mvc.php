<?php
/* Structure MVC : séparation des couches et des langages

	M : Modele => echange la BDD (Requête SQL)
	V : View => affichage et présentation des données (HTML/CSS)
	C : Controller => traitements (PHP)

exemple: 
	- Dans le Model : je fais ma requete SQL qui va aller récupérer tous les produits de la BDD
	- Dans le Controller : je fais des traitements (php) et décide d'afficher uniquement des produits 10 par 10
	- Dans la View : je présente les données (avec afficahge HTML/CSS) qui sortent du traitement (Controller) issue de la requete SQL (Model)

Un seul et unique point d'entré : l'index.

			Les FrontController (FC)

Model 									Model

BackController1 (BC)					BackController2 (BC)

View 									View

exemple: Si un internaute clic un lien, il déclenche une action dans la view qui va relancer le FrontController qui va choisir le BackController et qui communiquera son model et la view correspondante.

//----------------------------------------------------------
Avantages : 
	-clarté de l'architecture : 
		Si le SGBD doit changer , on ouvrira juste les fichiers models que le 			développeur utilisera
		Si le design doit changer, l'intégrateur ne risque de créer des conflit dans les traitements du codes.
	- Favorise le trvail collaboratif



//--------------------------------------------------------
schématisation de l'arborescence :

	Models/
		- membre
			-- fonction.inc.php

	Views/
		- membre
			-- connexion.html
			-- inscription.html
			-- profil.html
		- 404.html
		- haut-site.html
		- menu.html
		- bas-site.html
		- style.css

	Controllers/
		- membre
			-- connexion.php
			-- inscription.php
			-- profil.php
*/
			?>
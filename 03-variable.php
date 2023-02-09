<?php

//1-Les variables/////////////////////////////////////////////

$monPrenom = "ali";
$mon_prenom = "hassan";
$monmonprenom = "jacques";
echo $monPrenom; //affiche Ali
echo $mon_prenom; //affiche une erreur "undefined variable" soit variable indéfinie (inconnue)
echo $monprenom; //affiche une erreur undefined variable soit variable indéfinie (inconnue)

//2-Les constantes magiques////////////////////////////////
//D'autres constantes existent dans le langage PHP, on les appele des constantes magiques, par exemple :

echo __FILE__ . "<br>"; //Affiche le chemin complet vers le fichier actuel

echo __LINE__ . "<br>"; //Affiche le numéro de ligne

//3-La concaténation lors d'un affichage/////////////////////////////

$x = "bonjour"; // Affectation de la valeur "bonjour" à la variable "x"
$y = "tout le monde"; // Affectation de la valeur "tout le monde" à la variable "y"
echo $x . " " . $y . "<br>"; // Point de concaténation que l'on peut traduire par "suivi de.."

echo "hey ! $x $y <br>"; // même chose qu'à la ligne précédente mais sans concaténation

// Concaténation lors d'une affectation

$prenom1 = "bruno"; // Affectation de la valeur "bruno" sur la variable "$prenom1"
$prenom1 = "claire"; // Affectation de la valeur "claire" sur la variable "$prenom1", cela remplace "bruno" par "claire".

echo $prenom1 . "<br>"; //  // Affiche "claire"
$prenom2 = "nicolas"; // Affectation de la valeur "nicolas" sur la variable : $prenom2
$prenom2 .= " marie"; // Ajout sans remplacement de la valeur précédente grâce à l'opérateur ".="

echo $prenom2 . "<br>"; //Affiche : "nicolas marie"

//4-Différence entre l'utilisation des guillemets et des quotes
$jour = 'aujourd\'hui'; //Utilisation des quotes avec l'anti-slash pour éviter une erreur sur l'apostrophe du mot : aujourd'hui.

$jour = "aujourd'hui"; //utilisation des guillemets.
$texte = 'bonjour'; // Utilisation des quotes

echo $texte . "tout le monde<br>"; // Concaténation d'une variable et de texte

echo "$texte tout le monde<br>"; // Affichage des guillemets, la variable est évaluée

echo '$texte tout le monde<br>'; // Affichage dans des quotes, la variable n'EST PAS EVALUEE
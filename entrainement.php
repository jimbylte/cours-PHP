<?php

/*
Commentaire sur plusieurs lignes
*/

//commentaire sur une ligne

# commentaire sur une ligne

echo "Bonjour";
print "je suis pressé que ce soit samedi";
/*
Ces codes en PHP permettent d'afficher du texte
-echo et print sont plutôt semblables mais nous utiliserons majoritairement echo qui est compris quelques millièmes de secondes plus rapidement que print
-chaque instruction se termine par un point-virgule
-comme en JS, les chaines de charactères du code peuvent être mises entre apostrophes (quotes) ou entre guillemets.
*/

/*
D'autres instructions permettent d'afficher du contenu mais eon s'en servira principalement pour déboguer :
-print_r()
-var_dump()
*/

/*
Il est possible de faire du html dans une balise php :
echo "<p>Je suis pressé que les <strong>Vacances</strong> commencent !</p>"

//Il est possible de faire du PHP dans une balise HTML
*/

?>

<h2>
<?php echo "quelle météo splendide"; ?>
</h2>

<?php
/*
    Le code que nous venons de créer est moins propre (et professionnel) car il nous fait rentrer et sortir plusieurs fois du code PHP. C'est une méthode à éviter.
*/

//Lorsque 'lon regarde le code source de la page on remarque, comme vu dans le cours, qu'il n'y a pas de PHP

//-------------------------------------------------------------------------------------------------------

/* 
La déclaration de variable
en PHP pour déclarer une variable, on utilise le signe $
*/

$prenom = 'fred';

//affichage du contenu d'une variable

echo "bonjour $prenom <br>";

echo 'comment vas-tu $prenom ?';

// Avec les guillemets je n'ai pas besoin de concaténer ma variable, mais avec les apostrophes ma variable ne sera pas analysée comme telle mais comme du texte normal

/*
En langage professionnel, on dira ici qu'on a déclaré la variable prenom et qu'on lui a affecté une valeur : "fred".
N'oublions cependant pas qu'une variable peut varier
*/

$prenom = "hassan";
echo "$prenom est le meilleur!<br>";

/* 
Comme en js, on essaye de garder la même convention de nommage dans tout le site.
*/
/*
Il existe les même types de variable que nous avons vu en Js
-string : chaine de char
-boolean : booléen
integer : entier
double (float en js) : décimal
*/

$variable1 = 'bla bla bla';
echo "$variable1 :" . gettype($variable1) . "<br>";

// gettype est une fonction prédéfinie dans PHP qui permet d'afficher le type de la variable

$variable2 = true;
echo "$variable2 :" . gettype($variable2) . "<br>"; /*boolean*/
//ici le navigateur associe true à 1 et false à vide qui correspond à 0

$variable3 = 42.5;
echo "variable3 :" . gettype($variable3) . "<br>"; /* double */


/*
La constante existe aussi en PHP comme en js
C'est une fonction aussi prédéfinie define(), elle prend deux arguments :
1- son nom
2- sa valeur (contenu)
*/

// comme en js la constante n'évolue pas, elle garde tjrs la même valeur

define("CAPITALE", "Paris");
echo " <p> ". CAPITALE . "est la plus belle ville du monde. </p>";
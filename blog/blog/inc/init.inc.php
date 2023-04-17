<?php
/********************************
     1 - CONNEXION A LA BDD 
********************************/
$pdoBlog = new PDO(
    'mysql:host=localhost;
    dbname=blog',
    'root',
    '', // si je suis sur mac je dois mettre le mot de passe 'root'
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

/**********************************
     2 - OUVERTURE DE SESSION
**********************************/

session_start();

/****************************************
     3 - GERER LES ERREURS / SUCCES
****************************************/

// Une variable pour afficher les messages de réussite ou d'erreur

$contenu = "";

/* Cette variablre sera utilisée exclusivement pour afficher les erreurs et les messages de réuissites. 
On laisse vide et on la concatènera avec le symbole suivant : .=  pour afficher les messages */

require_once 'fonctions.inc.php';

?>


















































































<?php
/*********************************************
     1 - CREATION D'UNE FONCTION DE DEBUG
*********************************************/

function debug($mavar)
{
    echo '<pre class="alert alert-warning">';
    var_dump($mavar);
    echo '</pre>';
}

/* J'utiliserai cette fonction quand je développe mon site.
Lorsque mon site est en ligne, je NE DOIS PAS avoir de fonction de debug utilisée */

/*********************************************************************************
     2 - CREATION D'UNE FONCTION POUR VERIFIER QUE L'UTILISATEUR EST CONNECTE 
**********************************************************************************/

function estConnecte()
{
    if(isset($_SESSION['users']))
    {
        // si je récupère un indice 'users' dans la superglobale $_SESSION, cela signifie qu'un utilisateur est connecté
        return true;
    }
    else  // sinon personne n'est connecté
    {
        return false;
    }
}


/*********************************************************************************
     3 - CRATION D'UNE FONCTION POUR VERIFIER QU'UN MEMBRE EST CONNECTE et ADMIN
**********************************************************************************/

function estAdmin()
{
    if(estConnecte() && $_SESSION['users']['statut'] == 1)
    {
        // je verifie que l'utilisteur est connecté et que son statut correspond à 1 dans la BDD (pour admin)
        return true;
    }
    else
    {
        return false; // sinon, c'est un utilisateur lambda ou la personne n'est pas connecté
    }
}


//4-Création d'une fonction pour filtrer un code postale francais

function estCodePostalValide($codePostal) {
    //Expresion réguliere pour vérifier si le code est valide

    // $regex = "~^[0-9]{5}" ;
    $regex = '/^¨[0-9]{5}$/';

    //Vérifier si le code postal correspond à l'expression régulière 

    if(preg_match($regex, $codePostal)){
        // return true;
        echo'Ce code est valide';
    } else {
        // return false;
        echo'Ce code postal n\'est pas valide';
    }
}

?>

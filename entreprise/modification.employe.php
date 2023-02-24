<?php

// $pdoEntreprise = new PDO(
//     'mysql:host=localhost;
//     dbname=entreprise', 
//     'root',
//     '',
//     array(
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
//         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//     )
// );
include_once ("inc/fonctions.inc.php"); //le code de connection est inséré dans la page grâce à "include_once"

//réception des informations d'un seul employégrâce à la superglobale $_GET

if(isset($_GET['id_employes'])){
    $affichage = $pdoEntreprise->prepare("SELECT * FROM employes WHERE id_employes = :id_employes");
    /*Ici on sélectionne toutes les informations d'un salarié grâce à son "id" que l'on a précisé dans le href sur la page 02-employes.php.
    Sur le bouton "voir l'employé", lorsque j'utilise la flèche "->" je m'appuies sur / je me base sur...
                                    lorsque j'utilise la flèche "=>" l'élément à gauche correspond à l'élément de droite  
    */
    $affichage->bindParam('id_employes',$id_employes);
    $affichage->execute();
    //":id_employes" est un paramètre nommé dans la requête préparée. Il s'agit d'une syntaxe utilisée par PDO (PHP Data Objects), une extension de PHP pour l'interaction avec des bases de données.

// L'utilisation de paramètres nommés permet de préparer une requête SQL en spécifiant des noms de paramètres qui seront remplacés plus tard par des valeurs. Ces valeurs sont fournies lors de l'exécution de la requête, ce qui évite les injections SQL et rend le code plus sûr.

// Dans l'exemple que vous avez fourni, ":id_employes" est un paramètre nommé qui sera remplacé par la valeur de la variable $id_employes lors de l'exécution de la requête. Cela permet de récupérer toutes les colonnes de la table "employes" où l'identifiant "id_employes" est égal à la valeur de $_GET['id_employes'].

// Lors de l'exécution de la requête, PDO remplacera automatiquement ":id_employes" par la valeur de la variable$_GET['id_employes']. Cette méthode est plus sûre que d'insérer directement la valeur de $_GET['id_employes'] dans la requête SQL, car elle permet d'éviter les injections SQL en encadrant automatiquement la valeur de $_GET['id_employes'] dans des guillemets simples pour éviter tout caractère dangereux.
    $affichage->execute (array(':id_employes' => $_GET['id_employes'])); // dans un tableau (array), les informations sont séparées par des virgules 

    
    if($affichage->rowCount() == 0){
        //  si la personne arrive sur la page en récupérant un id_employe qui n'existe pas alors je la renvoie sur une autre page
        //rowCount() est une variable prédéfinie qui permet de compter combien de rangée renvoie une requête // si elle renvoie 0 c'est que cette requête est mauvaise ou que l'id n'existe plus 
        header('location:02-employes.php');
        exit();

    }

    $ficheEmploye = $affichage->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($ficheEmploye);
    // echo "<pre>";

}
else
{
    header('location:02-employes.php');
        exit();
}
//Mise à jour des informations d'un employe
// echo n"<pre>";
// var_dump($_POST);
// echo "</pre>";

if(!empty($_POST)) // Je vérifie que mon formulaire n'est pas vide (not empty)
{
    $_POST['prenom'] = htmlspecialchars(($_POST['prenom']));
    $_POST['nom'] = htmlspecialchars($_POST['nom']);

    $resultat = $pdoEntreprise->prepare("UPDATE employes SET prenom = :prenom, nom = :nom, genre = :genre, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");

    $resultat->execute(array(
        ':id_employes' => $_GET['id_employes'],
        ':prenom' => $_POST['prenom'],
        ':nom' => $_POST['nom'],
        ':genre'> $_POST['genre'],
        ':service' => $_POST['service'],
        ':date_embauche' => $_POST['date_embauche'],
        ':salaire' => $_POST['salaire'],
    ));
    header('location:02-employes.php');
    exit();
}

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Entreprise - Employé n°<?php echo $ficheEmploye['id_employes']; ?></title>

</head>

<body>
    <!-- jumbotron-fluid -->
    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Entreprise - Employé n° <?php echo $ficheEmploye['id_employes'] . ' - ' . $ficheEmploye['prenom'] . ' ' . $ficheEmploye['nom']; ?>
            </h1>
            <p class="col-md-8 fs-4">Dans cette page, nous allons afficher les informations d'un employé ainsi qu'un formulaire pour mettre à jour les informations. </p>
            <a class="btn btn-primary btn-lg" href="01-entreprise.php">Accueil</a>
        </section>
    </header><!-- fin du jumbotron -->

    <main class="container">
        <!-- <section class="row my-5">

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <?php echo $ficheEmploye['prenom'] . ' ' . $ficheEmploye['nom'] ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Service : <?php echo $ficheEmploye['service']; ?></p>
                        <p class="card-text">Salaire : <?php echo $ficheEmploye['salaire']; ?> €</p>
                        <p class="card-text">Genre : <?php
                    if ($ficheEmploye['genre'] == 'f') {
                    echo "Femme";
                    } else {
                    echo "Homme";
                    }
                    ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <p>Date d'embauche : <?php echo date('d/m/Y', strtotime($ficheEmploye['date_embauche']));
                                                /* Ici on utilise la fonction prédéfinie date() qui prend deux arguments : 1- le format de la date / 2- la notion que l'on veut transformer */
                                                ?></p>

                    </div>
                    <input type="submit" value="modifier" class="btn btn-warning">
                </div>
            </div> -->
        <section>
            <div class="col-12 col-md-6">
                <form action="#" method="POST" class="border p-2 bg-light">

                    <div class="mb-3">
                        <label for="prenom">Prénom de l'employé</label>
                        <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $ficheEmploye['prenom']; ?>">
                    </div><!-- fin prénom -->

                    <div class="mb-3">
                        <label for="nom">Nom de l'employé</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $ficheEmploye['nom']; ?>">
                    </div><!-- fin nom -->

                    <div class="mb-3">
                        <label for="sexe">Genre de l'employé</label>
                        <select name="sexe" id="sexe" class="form-select">
                            <option value="f">Femme</option>
                            <option value="m">Homme</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="service">Service de l'employé</label>
                        <select name="service" id="service" class="form-select">
                            <?php // je récupère les services depuis la BDD
                            $requeteService = $pdoEntreprise->query("SELECT DISTINCT service FROM employes");
                            // ma requête qui va cherher tous les services depuis ma BDD

                            while ($service = $requeteService->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=\"" . $service['service'] . "\">" . $service['service'] . "</option>";
                                // je demande l'affichage de chacun des services sous forme de <option>
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="salaire">Salaire de l'employé</label>
                        <input type="number" name="salaire" id="salaire" class="form-control" value="<?php echo $ficheEmploye['salaire']; ?>">
                    </div>

                    <input type="submit" value="valider" class="btn btn-warning">
                </form>
            </div>

        </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
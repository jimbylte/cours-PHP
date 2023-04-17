<?php

/******************************************************
     1 - CONNEXION A LA BDD (grâce au fichier init)
 ******************************************************/
require_once 'inc/init.inc.php';

/*****************************************************************
     2 - REQUETE POUR AFFICHER LES 5 ARTICLES les plus récents
 *****************************************************************/

$requete = $pdoBlog->query("SELECT * FROM articles ORDER BY id_article DESC LIMIT 0,5");


/*********************************************
 changement du 10 03 2023 - Je doit me rediriger vars la page d'accueil
pour cela il faut changer le lien vers      
3 - DECONNEXION DE L'UTILISATEUR pour redrection vers la page d'accueil index.php
*********************************************/
// si 'action' existe et si sa valeur est 'deconnexion'
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
{
    // Je vérifie que je récupère action = deconnexion
    session_destroy(); // détruire toutes les traces de la session
    $contenu .= '<div class="alert alert-success">Vous avez bien été déconnecté. <a href="connexion.php">Se reconnecter</a></div>';
}

?>





<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootswatch CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.1/litera/bootstrap.min.css" integrity="sha512-VytuSEcywyOk3/TgzUvYclfS5MrwPLUhVZHMGpN4O81Cu/LguN+MxiFUZOkem4VkRVAPC8BVqaGziJ+xUz2BZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="inc/style.css">
    <title>Mon blog - Accueil</title>
</head>

<body>

<?php  
echo $contenu; 
?>

    <?php require_once 'inc/nav.inc.php'; ?>

    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">MonBlog - Accueil</h1>
            <p class="col-md-8 fs-4">Affichage des 5 articles les plus récents</p>
<!-- note du 17/03/2023 pour le regex code postale -->
            <?php $codePostal = "75017AZER";
             estCodePostalValide($codePostal);
            ?>
        </section>
    </header>

    <main class="container">
        <section class="row">

            <?php
            // Pour récupérer chaque ligne je dois utiliser la fonction fetch() avec le mode FETCH_ASSOC qui détermine la façon dont PDO retourne la ligne. 
            while ($article = $requete->fetch(PDO::FETCH_ASSOC)) {
                // debug($article);
                // Pour limiter l'affichage du paragraphe à 100 caractères, j'utilise la fonction substr()
                echo '<div class="col-12 col-md-4">
                        <div class="card p-1 my-3">
                            <img src="' . $article['photo'] . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $article['titre'] . '</h5>
                                <p class="card-text">' . substr($article['contenu'], 0, 100) . '</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>'; 
                // debug($article);
            }
            ?>

        </section>
    </main>

    <?php require_once 'inc/footer.inc.php'; ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
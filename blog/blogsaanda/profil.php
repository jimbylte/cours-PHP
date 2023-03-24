<?php

/********************************
     1 - CONNEXION A LA BDD 
********************************/
require_once 'inc/init.inc.php';

/**************************************************
     2 - REDIRECTION VERS LA PAGE DE CONNEXION
          si l'utilisateur n'est pas connecté
**************************************************/

if(!estConnecte())    // si la personne n'est pas connecté
{
    header('location:connexion.php');
    exit(); // je renvoie vers la page connexion.php
}


// /*********************************************
//      3 - DECONNEXION DE L'UTILISATEUR
// *********************************************/
// // si 'action' existe et si sa valeur est 'deconnexion'
// if(isset($_GET['action']) && $_GET['action'] == 'deconnexion')
// {
//     // Je vérifie que je récupère action = deconnexion
//     session_destroy(); // détruire toutes les traces de la session
//     $contenu .= '<div class="alert alert-success">Vous avez bien été déconnecté. <a href="connexion.php">Se reconnecter</a></div>';

// }

?>



<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.1/litera/bootstrap.min.css" integrity="sha512-VytuSEcywyOk3/TgzUvYclfS5MrwPLUhVZHMGpN4O81Cu/LguN+MxiFUZOkem4VkRVAPC8BVqaGziJ+xUz2BZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MonBlog - Profil de <?php echo $_SESSION['users']['prenom'] . ' '. $_SESSION['users']['nom'] ?></title>
</head>

<body>

    <?php require_once 'inc/nav.inc.php'; ?>

    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
        <h1 class="display-5 fw-bold">MonBlog - Profil de <?php echo $_SESSION['users']['prenom'] . ' '. $_SESSION['users']['nom'] ?></h1>
            <p class="col-md-8 fs-4">
                <?php 
                if(estAdmin())
                {
                    echo "Bienvenue, administrateur";
                }
                else
                {
                    echo "Vous êtes connecté";
                }
                ?>
            </p>
        </section>
    </header>

    <main class="container">
        <section class="row">
            
                <?php
                    echo $contenu;
                ?>

            <div class="card text-center">
                <div class="card-header">
                    <h5 class="card-title">

                        <?php
                            echo $_SESSION['users']['prenom']. ' ' . $_SESSION['users']['nom'];
                        ?>

                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $_SESSION['users']['mail']; ?></p>
                    <p class="card-text"><?php echo $_SESSION['users']['pseudo']; ?></p>
                    <p class="card-text">

                        <?php 
                        if($_SESSION['users']['genre'] == 'f') 
                        {
                            echo 'Femme';
                        }
                        else
                        {
                            echo 'Homme';
                        } 
                        ?>

                    </p>
                </div>
                <div class="card-footer text-muted">
                    <!-- <a href="profil.php?action=deconnexion" class="btn btn-secondary">Me déconnecter</a> -->

                    <a href="index.php?action=deconnexion" class="btn btn-secondary">Me déconnecter</a>

                </div>

            </div>
        </section>
    </main>

    <?php require_once 'inc/footer.inc.php' ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
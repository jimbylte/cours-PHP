<?php
/******************************************************
     1 - CONNEXION A LA BDD (grâce au fichier init)
******************************************************/
require_once 'inc/init.inc.php';

/****************************************************
     2 - REQUETE POUR AFFICHER LES ARTICLES 
****************************************************/
// $requete = $pdoBlog->query("SELECT * FROM articles ORDER BY id_article DESC");
/****************************************************
     3 - Suppression de l'article : Note du 10/03/23
     REQUETE POUR la Suppresion d'un article  LES ARTICLES 
****************************************************/
  if(isset($_GET['action']) && $_GET['action'] =='suppression' && isset($_GET['id'])){
    $delete = $pdoBlog->prepare("DELETE FROM articles WHERE id_article = :id_article");
    $delete ->execute(array(':id_article' => $_GET['id'],));

if( $delete->rowCount() == 0) {
    $contenu .='<div class="alert alert-danger">ERREUR de suppression pour l\'article numero 
    ' .$_GET['id'] .'</div>';
}else{
    $contenu .='<div class="alert alert-success">vous avec bien suuprimer l\'article numero 
    ' .$_GET['id'] .'</div>';
}
}

  $requete = $pdoBlog->query("SELECT * FROM articles ORDER BY id_article DESC");

// /****************************************************
//      4 - Ajout l'article : Note du 13/03/23
//      REQUETE POUR Ajouter un ARTICLES 
// ****************************************************/
//  if(!empty($_POST)){ 
// /* La requette pour Ajouter un article */ 
//   $ajout = $pdoBlog->prepare("INSERT INTO articles (titre,contenu,photo, id_user) 
//   VALUES (:titre, :contenu, :photo, :id_user)");
   
//   $ajout->execute(array(
//     //'id_article'=>$_GET['id']),
//     ':titre' =>$_POST['titre'],
//     ':contenu' =>$_POST['contenu'],
//     ':photo' =>$_POST['photo'],
//     ':id_user'=> $_SESSION['users']['id_user'],
//   ));

//   header('location:articles.php');
//   exit();

// }
/**------------------------un test si l utilsateur a modifier un article ----------------------------------------------------------------------- */
    // if($modif){
    //     $contenu .='<div class=" alert alert-success">Vous avez modifié l\'article avec succès.
    //     </div>';
    // }else{
    //     $contenu .= '<div class=" alert alert-warning">Erreur lors de la modification.</div>';
    // }
/**------------------------------------------------------------------------------------ */
?>



<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootswatch CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.1/litera/bootstrap.min.css" integrity="sha512-VytuSEcywyOk3/TgzUvYclfS5MrwPLUhVZHMGpN4O81Cu/LguN+MxiFUZOkem4VkRVAPC8BVqaGziJ+xUz2BZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MonBlog - Articles</title>
</head>

<body>
    <?php require_once 'inc/nav.inc.php'; ?>

    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">MonBlog - Articles</h1>
            <p class="col-md-8 fs-4">Affichage des articles</p>
            <?php 
                // si je suis connecté et admin j'ai accès au lien ajouter
                if(estConnecte() && estAdmin())
                {
                    echo '<a href="ajout-article.php" class="btn btn-primary btn-lg">Ajouter d\'un article</a>';
                }
            ?>
        </section>
    </header>

    <main class="container">
        <section class="row">
        

            <?php
            echo $contenu; 

            // Affichage des articles
            // Pour récupérer chaque ligne je dois utiliser la fonction fetch() avec le mode FETCH_ASSOC qui détermine la façon dont PDO retourne la ligne.

            while($article = $requete->fetch(PDO::FETCH_ASSOC))
            {
                // Afin d'eviter les balises dans le paragraphe, j'utilise la fonction html_entity_decode()

                echo '<div class="col-12 col-md-4">
                        <div class="card p-1 my-3">
                            <img src="'.$article['photo'].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$article['titre'].'</h5>
                                <p class="card-text">'. html_entity_decode(substr($article['contenu'], 0,100)).'</p>';

                                if(estConnecte() && estAdmin())
                                {
                                    echo '<a href="articles.php?action=suppression&id=' .$article['id_article'] . '"class="btn btn-danger" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer cet article?\'))">Supprimer l\'article</a>';
                                }
                                
                                echo '<a href="article.php?id=' . $article['id_article'] . '" class="btn btn-outline-primary">Voir l\'article</a>;
                            
                            </div>
                        </div>
                    </div>';
            }
                
            ?>
                  <!-- Note du 13/03/23 pour l'ajout d'un article j'ai coller dans un autre page ajout-article.php -->
            <!-- <h2>Ajouter un article</h2>
            <form action="#" method="POST" class="mb-5 alert alert-success">

                <div class="mb-3">
                    <label for="titre">Titre de l'article</label>
                    <input type="text" name="titre" id="titre" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="contenu">Contenu de l'article</label>
                    <textarea name="contenu" id="contenu" rows="15"></textarea>
                </div>

                <div class="mb-3">
                    <label for="photo">Photo de l'article</label>
                    <input type="text" name="photo" id="photo" placeholder="URL de l'image" class="form-control">
                </div>

                <input type="submit" value="Ajouter un article" class="btn btn-outline-light">

            </form> -->

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
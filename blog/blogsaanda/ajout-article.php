<?php
//1-Connexion a la BDD date du 10/03/23
require_once 'inc/init.inc.php';

//debug($_POST);
//extract($_POST);//quand on utilise extract il me créer automatiquement les variables
//htmlspecialchars => Sécuriser les input de type text
/****************************************************
   2- Ajout l'article : Note du 13/03/23
     REQUETE POUR Ajouter un ARTICLES ce code marche correctement mais jsute pour verrifier celui d'en bas
****************************************************/
// if(!empty($_POST)){ 
//   /* La requette pour Ajouter un article */ 
//     $ajout = $pdoBlog->prepare("INSERT INTO articles (titre,contenu,photo, id_user) 
//     VALUES (:titre, :contenu, :photo, :id_user)");
     
//     $ajout->execute(array(
//       //'id_article'=>$_GET['id_article']),
//       ':titre' =>$_POST['titre'],
//       ':contenu' =>$_POST['contenu'],
//       ':photo' =>$_POST['photo'],
//       ':id_user'=> $_SESSION['users']['id_user'],
//     ));
  
//     header('location:articles.php');
//     exit();
  
//   }
  /**------Note -du 14/03/2023----cette partie jusqu'numero 79 n'est pas fini ------------------ */
  
  if(!empty($_POST)){
    //pour le titre

    if(!isset($_POST['titre']) || strlen($_POST['titre']) <2 || strlen($_POST['titre']) > 20){
        $contenu .='<div class="alert alert-warning">Votre titredoit faire entre 2 et 20 caractéres.</div>';
    } 

      //Pour le contenue
    if(!isset($_POST['contenu']) || strlen($_POST['contenu']) <5 || strlen($_POST['contenu']) >30){
        $contenu .='<div class="alert alert-warning">Vous devez saisir un contenue.</div>';
    } 

    //pour la photo
    if(!isset($_POST['photo']) ){
        $contenu .='<div class="alert alert-warning">Votre photo n\'est pas conforme. </div>';
    } 
    

    if(empty($contenu)){  // Si la variable $contenu est vide, Alors la personne à rempli correctement le formulaire on peut entrer les infos en BDD
        
       
    //    Preparation de la requette d'insertion

       $ajout = $pdoBlog->prepare("INSERT INTO articles (titre,contenu,photo, id_user) 
        VALUES (:titre, :contenu, :photo, :id_user)");
         
        $ajout->execute(array(
          
          ':titre' =>$_POST['titre'],
          ':contenu' =>$_POST['contenu'],
          ':photo' =>$_POST['photo'],
          ':id_user'=> $_SESSION['users']['id_user'],
        ));
      
        header('location:articles.php');
        exit();
            
            if($ajout){
                $contenu .= '<div class="alert alert-success">Vous êtes inscrits dur le site.<a href="modif-article.php">la modification a eu de succées.</a></div>';
            } else {
                $contenu .='<div class="alert alert-danger">Erreur lors de la modification.</div>';

            }
        } 
       }
    //}
// --------------------------------------------------------------------------------------------
?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootswatch CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.1/litera/bootstrap.min.css" integrity="sha512-VytuSEcywyOk3/TgzUvYclfS5MrwPLUhVZHMGpN4O81Cu/LguN+MxiFUZOkem4VkRVAPC8BVqaGziJ+xUz2BZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MonBlog - <?php echo $ficheArticle['titre'];  ?></title>
</head>

<body>
    <?php echo $contenu;?>

    <?php require_once 'inc/nav.inc.php'; ?>
    
    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">

            <h1 class="display-5 fw-bold">Ajout article</h1>
        </section>
    </header>

    <main class="container">
        <section class="row my-5">

            <div class="col-12 col-md-7 mx-auto">
              
            <form action="#" method="POST" class="mb-5 alert alert-success">

<div class="mb-3">
    <label for="titre">Titre de l'article</label>
    <input type="text" name="titre" id="titre" class="form-control" 
    value="<?php if (isset($_POST['titre'])){echo $_POST['titre'];} ?>">
</div>

<div class="mb-3">
    <label for="contenu">Contenu de l'article</label>
    <textarea name="contenu" id="contenu" rows="15" class="w-100"></textarea>
</div>

<div class="mb-3">
    <label for="photo">Photo de l'article</label>
    <input type="text" name="photo" id="photo" placeholder="URL de l'image" class="form-control">
</div>

<input type="submit" value="Ajouter un article" class="btn btn-outline-light">

</form> 
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
<?php
require_once 'inc/init.inc.php';
// debug($_POST);

if (!empty($_POST)) {

    $titre = $_POST['titre'];
    $content = $_POST['contenu'];
    $photo = $_POST['photo'];

    if (empty($titre)) {
        $contenu .= '<div class="alert alert-warning">Vous devez saisir un titre </div>';
    }
    if (empty($content)) {
        $contenu .= '<div class="alert alert-warning"> Veuillez saisir le contenu de l\'article </div>';
    }

    if (empty($photo)) {
        $contenu .= '<div class="alert alert-warning"> Veuillez insérez la photo appropriée à cet article </div>';
    }


    if (empty($contenu)) {

        $titre = htmlspecialchars($titre);
        $content = htmlspecialchars($content);
        $photo = htmlspecialchars($photo);
        // htmlspecialchars => sécuriser les input de type text

        /* préparation de la requête d'insertion */
        $insertion = $pdoBlog->prepare("INSERT INTO articles (titre, contenu, photo, id_user) VALUES (:titre, :contenu, :photo, :id_user)");

        /* je fais correspondre les marqueurs avec ce qui se trouve dans mon formulaire et dans $_SESSION */
        $insertion->execute(array(
            ':titre' => $titre,
            ':contenu' => $content,
            ':photo' => $photo,
            ':id_user' => $_SESSION['users']['id_user'] // je récupère l'id de l'utilisateur connecté pour l'auteur de l'article
        ));


        if ($insertion) {
            header(('location:articles.php'));
            exit;
        } else {
            $contenu .= '<div class="alert alert-danger">Erreur lors de l\'insertion </div>';
        }
    }
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

    <title>MonBlog - Ajout d'article</title>


    <!-- 
     https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
     1 - CKEditor est un module qui permet d'avoir un textarea avec plus de fonctionnalités.
     2 - Pour que CKEditor fonctionne, nous aurons besoin de deux éléments : un script dans m'en tête et un script avant la fermeture de body.
     3 - L'élément sur lequel nous voulons utiliser CKEditor devra avoir un identifiant.
     4 - Il faudra penser à ajouter un htmlspecialchars car cet élément fera parti d'un formulaire
     5 - Il faudra utiliser la fonction prédéfinie html_entity_decode sur les autres pages pour afficher correctement le contenu de notre colonne de BDD
     -->

    <!-- SCRIPT CKEDITOR -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            color: black;
            min-height: 300px;
            background-color: red;
        }
    </style>

</head>



<body>
    <?php require_once 'inc/nav.inc.php'; ?>
    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">MonBlog - ajouter un Articles</h1>
            <p class="col-md-8 fs-4">Formulaire d'ajout</p>
        </section>
    </header>

    <main class="container">
        <section class="row">


            <?php

            echo $contenu;

            ?>

            <h2>Ajouter un article</h2>
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

                <input type="submit" name="submit" value="Ajouter un article" class="btn btn-outline-light">

            </form>
        </section>
    </main>

    <?php require_once 'inc/footer.inc.php' ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <!-- Script de CKEditor -->
    <script>
        ClassicEditor
            .create(document.querySelector('#contenu'))
            .catch(error => {
                console.error(error);
            })
    </script>
</body>
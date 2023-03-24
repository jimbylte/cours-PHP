<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootswatch CSS v5.2.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.1/litera/bootstrap.min.css" integrity="sha512-VytuSEcywyOk3/TgzUvYclfS5MrwPLUhVZHMGpN4O81Cu/LguN+MxiFUZOkem4VkRVAPC8BVqaGziJ+xUz2BZw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>MonBlog - Articles</title>

    <!-- 
     https://ckeditor.com/docs/ckeditor5/latest/builds/guides/quick-start.html
     1 - CKEditor est un module qui permet d'avoir un textarea avec plus de fonctionnalités.
     2 - Pour que CKEditor fonctionne, nous aurons besoin de deux éléments : un script dans m'en tête et un script avant la fermeture de body.
     3 - L'élément sur lequel nous voulons utiliser CKEditor devra avoir un identifiant.
     4 - Il faudra penser à ajouter un htmlspecialchars car cet élément fera parti d'un formulaire
     5 - Il faudra utiliser la fonction prédéfinie html_entity_decode sur les autres pages pour afficher correctement le contenu de notre colonne de BDD
     -->

    <!-- SCRIPT CKEDITOR -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable[role="textbox"] {
            color: black;
            min-height: 300px;
            background-color: red;
        }
    </style> -->
</head>

<body>

    <?php
    // 1- Connexion à la bdd grâce au fichier init
    require_once 'inc/init.inc.php';

    // // 2- Requête pour afficher les articles
    // $requete = $pdoBlog->query("SELECT * FROM articles ORDER BY id_article DESC");

    // 3- Ajout d'un article
    if (!empty($_POST)) { // vérification que le formulaire n'est pas vide
    debug($_POST);

        $_POST['titre'] = htmlspecialchars($_POST['titre']);
        $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
        $_POST['photo'] = htmlspecialchars($_POST['photo']);
        // htmlspecialchars => sécuriser les input de type text

        /* préparation de la requête d'insertion */
        $insertion = $pdoBlog->prepare("INSERT INTO articles (titre, contenu, photo, id_user) VALUES (:titre, :contenu, :photo, :id_user)");

        /* je fais correspondre les marqueurs avec ce qui se trouve dans mon formulaire et dans $_SESSION */
        $insertion->execute(array(
            ':titre' => $_POST['titre'],
            ':contenu' => $_POST['contenu'],
            ':photo' => $_POST['photo'],
            ':id_user' => $_SESSION['users']['id_user'], // je récupère l'id de l'utilisateur connecté pour l'auteur de l'article
        ));
    }

    // // 4- Suppresion de l'article

    if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_article'])) {

        $delete = $pdoBlog->prepare("DELETE FROM articles WHERE id_article = :id_article");
        $delete->execute(array(
            ':id_article' => $_GET['id_article'],
        ));

        if ($delete->rowCount() == 0) {
            $contenu .= '<div class="alert alert-danger">Erreur de suppression pour l\'article n°' . $_GET['id_article'] . '</div>';
        } else {
            $contenu .= '<div class="alert alert-success">L\'article n°' . $_GET['id_article'] . ' a bien été supprimé</div>';
        }
    }

    // ------------------------------------------------------

    // 2- Requête pour afficher les articles
    $requete = $pdoBlog->query("SELECT * FROM articles ORDER BY id_article DESC");
    ?>

    <?php require_once 'inc/nav.inc.php'; ?>

    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">MonBlog - Articles</h1>
            <p class="col-md-8 fs-4">Affichage des articles</p>
        </section>
    </header>

    <main class="container">
        <section class="row">
            <?php
            echo $contenu;
            // affichage des articles
            while ($article = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <div class="col-12 col-md-4 ">
                <div class="card p-1 my-3">
                    <img src="' . $article['photo'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $article['titre'] . '</h5>
                        <p class="card-text">' . html_entity_decode(substr($article['contenu'], 0, 100)) . '</p>';

                if (estConnecte() && estAdmin()) {
                    echo '<a href="articles.php?action=suppression&id_article=' . $article['id_article'] . '" class="btn btn-danger" onclick="return(confirm(\'Êtes-vous sûr de vouloir supprimer cet article?\'))">Supprimer l\'article</a>';
                }

                echo '
                    <a href="article.php?id_article=' . $article['id_article'] . '" class="btn btn-outline-primary">Voir l\'article</a>
                </div>
                </div>
                </div>';
            }
            ?>

            <?php if (estConnecte() && estAdmin()) { ?>

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

                    <input type="submit" value="Ajouter un article" class="btn btn-outline-light">

                </form>
            <?php } ?>
        </section>
    </main>

    <?php require_once 'inc/footer.inc.php' ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <!-- Script de CKEditor -->
    <!-- <script>
        ClassicEditor
            .create(document.querySelector('#contenu'))
            .catch(error => {
                console.error(error);
            })
    </script> -->
</body>

</html>
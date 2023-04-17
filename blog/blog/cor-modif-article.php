<?php

// 1- Connexion à la BDD
require_once 'inc/init.inc.php';


// 2- Sélection d'un article en particulier
if (isset($_GET['id'])) {

    $article = $pdoBlog->prepare("SELECT * FROM articles WHERE id_article = :id_article");
    $article->execute(array(
        ':id_article' => $_GET['id'],
    ));

    // 3- Si la personne arrive sur la page avec un id_article dans l'url qui n'existe pas // redirection vers la page articles.php
    if ($article->rowCount() == 0) {
        header('location:articles.php');
        exit();
    }

    $ficheArticle = $article->fetch(PDO::FETCH_ASSOC);
    
} else { // 4- Si la personne arrive sans id_article dans l'url // redirection vers la page articles.php
    header('location:articles.php'); 
    exit();
}

if(!empty($_POST)){

    $_POST['titre'] = htmlspecialchars($_POST['titre']);
    $_POST['contenu'] = htmlspecialchars($_POST['contenu']);
    $_POST['photo'] = htmlspecialchars($_POST['photo']);

    // reuqête de modification
    $update = $pdoBlog->prepare(" UPDATE articles SET titre = :titre, contenu = :contenu, photo = :photo WHERE id_article = :id_article ");

    $update->execute(array(
        ':titre' => $_POST['titre'],
        ':contenu' => $_POST['contenu'],
        ':photo' => $_POST['photo'],
        ':id_article' => $_GET['id'],
    ));

    header('location:articles.php');
    exit();

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

    <title>MonBlog - <?php echo $ficheArticle['titre']; ?></title>
</head>

<body>

    <?php require_once 'inc/nav.inc.php'; ?>
    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Modification de : <?php echo $ficheArticle['titre']; ?></h1>
        </section>
    </header>

    <main class="container">
        <section class="row my-5">
            
            <div class="col-12 col-md-7 mx-auto">
                <form action="#" method="POST">

                    <div class="mb-3">
                        <label for="titre">Titre de l'article</label>
                        <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $ficheArticle['titre']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="contenu">Contenu de l'article</label>
                        <textarea name="contenu" id="contenu" rows="12" class="form-control"><?php echo $ficheArticle['contenu']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="photo">Photo de l'article</label>
                        <input type="text" name="photo" id="photo" class="form-control" value="<?php echo $ficheArticle['photo']; ?>">
                    </div>

                    <input type="submit" value="Modifier l'article" class="btn btn-outline-primary">

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
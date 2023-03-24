<?php
/******************************************************
     1 - CONNEXION A LA BDD (grâce au fichier init)
******************************************************/
require_once 'inc/init.inc.php';

/****************************************************
     2 - SELECTION D'UN ARTICLE EN PARTICULIER //note de comprendre :(les deux point c est un marquer qui correspond a cette valeur) 
     quand on clique sur le bouton 'voir article'
****************************************************/

if(isset($_GET['id_article']))
{
    $article = $pdoBlog->prepare("SELECT * FROM articles WHERE id_article = :id_article");
    $article->execute(array(
        ':id_article' => $_GET['id_article'],
    ));
    // 3 - Si la personne arrive sur la page avec un id_article dans l'url qui n'existe pas // redirection vers la page articles.php
    if($article->rowCount() == 0)
    {
        header('location:articles.php');
        exit();
    }

    $ficheArticle = $article->fetch(PDO::FETCH_ASSOC);
}
else
{
    // Si la personne arrive sans id_article dans l'url // redirection vers la page articles.php
    header('location:articles.php');
    exit();
}

?>

<!-- cote HTML -->
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

<?php require_once 'inc/nav.inc.php'; ?>

<body>
    <header class="p-5 mb-4 bg-secondary rounded-bottom">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold mb-5">MonBlog - <?php echo $ficheArticle['titre']; ?>

            <!-- PHP -->
            <?php 
                // si je suis connecté et admin j'ai accès au lien modifier
                if(estConnecte() && estAdmin())
                {
                    echo '<a href="modif-article.php?id_article=' . $ficheArticle['id_article'] .
                     '"class="btn btn-primary btn-lg">Modification d\'un article</a>';
                }
            ?>
            <!-- FIN PHP -->

        </section>
    </header>

    <main class="container">
        <section class="row my-5">

            <img src="<?php echo $ficheArticle['photo']; ?>" class="img-fluid">
            <?php echo html_entity_decode($ficheArticle['contenu']); ?>
            
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
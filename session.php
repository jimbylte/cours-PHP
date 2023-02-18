<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>PHP - Session de connexion</title>
</head>

<body>

    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">La session en PHP</h1>
            <p class="col-md-8 fs-4">Grâce à des fonctions prédéfinies accompagnées par la superglobale $_SESSION, nous allons pouvoir connecter notre utilisateur puis le déconnecter.</p>
            
            <nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2"href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link m-2" href="06-array.php">array</a>
                <a class="nav-link m-2" href="08-inclusion.php">inclusion</a>
                <a class="nav-link m-2" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link m-2" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link active m-2" aria-current="page" href="session.php">Session de connection</a>
                <a class="nav-link m-2" href="07-exercices.php">exercices</a>
            </nav>

        </section>
    </header>

    <main class="container">
        <section class="row">
            <h2>Le démarrage de session</h2>
            <p>On définiera souvent la fonction de connexion dans la page init. Ainsi, dès qu'une personne arrive sur notre site une session est ouverte sur son PC. On pourra donc récupérer, une fois qu'ils se sera connecté ses informations grâce la superglobale $_SESSION. Comme on l'a déjà vu, une superglobale renvoie un array, il faudra donc utiliser des crochets pour récupérer le nom de l'utilisateur, ou encore son mail, etc. </p>
            <p>La fonction prédéfinie pour lancer une session est session_start().</p>

            <h2>Vérifier si un utilisateur est connecté</h2>
            <p>Pour vérifier si un utilisateur est connecté et lui permettre ainsi d'accéder à SA page de profil, on va utiliser la superglobale $_SESSION['users']. Ici, je vérifie que ma superglobale récupère bien un utilisateur donné. Si c'est le cas, je pourrai lui permettre d'accéder à ses informations. <code>$_SESSION['users']</code> est défini au moment de la connexion de notre utilisateur. </p>

            <h2>La déconnexion</h2>
            <p>Pour déconnecter notre utilisateur, on utilisera également une fonction prédéfinie. On part d'un simple lien dans lequel on définit une action 'deconnexion' et dans le code PHP, on vérifiera qu'on récupère bien une action de déconnexion. Si tous ces critères sont réunis alors on lancera la fonction prédéfinie session_abort(). Cette fonction permet de mettre fin à la session en cours. </p>
        </section>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
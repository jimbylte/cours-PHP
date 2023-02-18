<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Les super globales $_GET et $_POST</title>
</head>

<body>

    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">$_GET et $_POST</h1>
            <p class="col-md-8 fs-4">Les méthodes get et post sont des méthodes qui permettent de récupérer des informations en PHP mais elles ont des différences importantes. </p>
            <nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2"href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link m-2" href="06-array.php">array</a>
                <a class="nav-link m-2" href="08-inclusion.php">inclusion</a>
                <a class="nav-link active m-2" aria-current="page" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link m-2" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link m-2" href="session.php">Session de connection</a>
                <a class="nav-link m-2" href="07-exercices.php">exercices</a>
            </nav>
        </section>
    </header>


    <main class="container">
        <section class="row">
            <h2>Utilisation</h2>
            <p>Dans les sites modernes, les clients (navigateur web) récupèrent du document HTML mais il y a aussi une transmission d'information comme : </p>
            <ul>
                <li>la recherche faite par le client</li>
                <li>le contenu d'un formulaire</li>
                <li>sélection de filtre comme dans une boutique en ligne</li>
                <li>tri d'une liste</li>
            </ul>
            <p>Pour la transmission de ces information au serveur, le protocole HTTP prévoit plusieurs méthodes, les deux plus importantes sont <code>$_GET</code> et <code>$_POST</code>. Elles aboutissent au même résultat mais sont pourtant fondamentalement différentes. </p>

            <!-- .col-12.col-md-6*2 -->
            <div class="col-12 col-md-6">
                <h3>La méthode <code>$_GET</code></h3>
                <p>Avec cette méthode, les données sont envoyées dans le serveur par l'url. C'est la raison pour laquelle, quand on a utilisé la méthode $_GET jusqu'à maintenant, vous pouviez voir les informations passées dans l'url. Cette méthode présente des avantages comme des inconvénients.</p>
                <h4>Les avantages</h4>
                <p>Ces paramètres passés dans l'URL peuvent être enregistrés et on peut donc revenir directement sur la page que l'on veut voir. On pourra donc mettre une requête en marque page comme lorsque l'on trouve tel ou tel vêtement intéressant. C'est donc utile pour visualiser régulièrement une section de Google Map ou encore une page web avec certains paramètres de filtre et de tri.</p>
                <h4>Les inconvénients</h4>
                <p>Le principal inconvénient est l'absence de protection des données : toutes personnes passant derrière nous pourra voir les données saisies dans l'url (pseudo, mail, mdp, etc). Ces données seront également stockées dans l'historique et dans le cache. Cette méthode a en plus une capacité limitée : suivant le navigateur sur lequel on se trouve, l'url ne peut faire qu'un certain nombre de caractères, en général 2000. Cela limite donc les données que l'on peut envoyer vers le serveur. Les URL ne peuvent en plus que contenir ce qu'on appelle les données ASCII, les fichiers d'images, d'audio, etc. ne peuvent pas passer dans une requête par l'url. </p>
            </div>

            <div class="col-12 col-md-6">
                <h3>La méthode <code>$_POST</code></h3>
                <p>Les données, avec la méthode $_POST, sont passées dans la requête HTTP et elles ne sont pas visibles par l'utilisateur. </p>
                <h4>Les avantages</h4>
                <p>Lorsqu'il s'agit de transmettre des données sensibles ou confidentielles comme dans un formulaire d'inscription, on utilisera la méthode $_POST. Les données ne sont en effet pas mises en cache et et ne sont donc pas dans l'historique du navigateur. Cette méthode permet en plus de transmettre des fichiers binaire, comme des photos, vidéos, etc.</p>
                <h4>Les inconvénients</h4>
                <p>Si une page est mise à jour juste après la soumission d'un formulaire, le formualaire sera envoyé une seconde fois au serveur ce qui pourrait provoquer des doublons. Certains programmes récents peuvent cependant pallier à ce problème. Il y aussi l'inconvénient de ne pas pouvoir se souvenir d'une requête passée, comme lorsque l'on fait un tri sur un site, cette requête ne peut pas être mise en marque page.</p>
            </div>
            <div class="col-12">
                <h2>Quelle méthode pour quelle utilisation ?</h2>
                <p>On utilisera plutôt la méthode post et la méthode get de la façon suivante :</p>
                <ul>
                    <li><strong>$_GET :</strong> pour les filtres, le tri de données, les saisies de recherche</li>
                    <li><strong>$_POST : </strong>pour la transmission des données de l'utilisateur</li>
                </ul>
            </div>
        </section>
    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>PHP - PDO</title>
</head>
<body>
    <!-- jumbotron-fluid -->
    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Le PDO - PHP Data Object</h1>
            <p class="col-md-8 fs-4">la variable pdo est un objet qui représente la connexion à la base de données</p>
            
            <nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2"href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link m-2" href="06-array.php">array</a>
                <a class="nav-link m-2" href="08-inclusion.php">inclusion</a>
                <a class="nav-link m-2" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link active m-2" aria-current="page" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link m-2" href="session.php">Session de connection</a>
                <a class="nav-link m-2" href="07-exercices.php">exercices</a>
            </nav>

        </section>
    </header>
    <main class="container">
        <section class="row">
            <div class="col-12 col-md-6">
                <h2>La connexion à BDD</h2>
                <pre><code>
                    $pdConnect = new PDO(
                        'mysql:host=localhost;
                        dbname=nomBDD','root',
                        '',
                        array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        )
                    );
                </code></pre>
<!---->
            </div>
            <div class="col-12 col-md-6">
                <p>En premier lieu lorsque l'on fait une connexion à une BDD, on précise <code>new PDO()</code>. Ce code permet de créer un objet (on en verra plus sur les objets dans la programmation orientée objet) de connexion sur lequel on s'appuiera pour faire des requêtes.</p>
                <p>Dans les parenthèses de PDO, on précise d'abord le driver mysql, ici localhost, puis le nom de la BDD, le nom d'utilisateur et le mot de passe. </p>
                <p>Dans le tableau (array()) viendront les précisions sur l'affichage des erreurs SQL dans notre site : on précise que l'on veut afficher les erreurs sur le site dans un premier temps, puis le jeu de caractères pour les échanges avec la BDD.</p>
            </div>
        </section>
        <section class="row">
            <div class="col-12 col-md-6">
                <h2>2- Les requêtes</h2>
                <h3>la fonction prédéfinie query()</h3>
                <p>On utilisera query() lorsque l'on a toutes les informations sur la requête que nous voulons faire : avec query les requêtes sont exécutées directement, on ne récupère pas d'informations venant de la page. On s'en sert donc majoritairement pour faire des select. <code>SELECT * FROM films ORDER BY titre ASC LIMIT 0,5</code></p>
            </div>
            <div class="col-12 col-md-6">
                <h3>les fonctions prédéfinies prepare() et execute()</h3>
                <p>Lorsque l'on veut récupérer des infos venant d'un formulaire ou se trouvant dans l'url, on utilisera les fonctions prepare et execute. La première sert à faire la requête en laissant ce qu'on appelle des <strong>marqueurs vides.</strong> Les données de ces marqueurs seront précisées dans la fonction execute dans un array(). On utilisera les super globales $_GET ou $_POST pour récupérer les données. </p>
            </div>
            <div class="col-12">
                <p>Grâce à ces deux requêtes, nous récupérons des informations. Mais elles ne seront pas afficher tant qu'on ne demandera pas d'aller chercher les informations grâce à une fonction prédéfinie <code>fetch()</code>. Dans les parenthèses nous préciserons PDO::FETCH_ASSOC. Cette méthode est l'une des nombreuses qui existe, elle renvoie les informations sous forme de ligne : comme dans un tableau , chaque enregistremet représente une ligne. </p>
            </div>
            <div class="col-12">
                <?php
                /*Faire une conexion à la BDD "entreprise"
                Afficher le nombre d'employés dans une phrase :
                *il y a .... employes dans l'entreprise */
                //1- Connexion à la BDD
                $pdoEnt = new PDO(
                    'mysql:host=localhost; dbname=entreprise',
                    'root',
                    '',
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    )
                );
                //2-Traitement
                // $request = $pdoEnt ->query("SELECT * FROM employes");
                // $nbEmployes = $pdoEnt ->query("SELECT * FROM employes")->rowCount();
                // On peut noter l'objet dans une variable $requete
                $requete = $pdoEnt ->query("SELECT * FROM employes");
                $nbEmployes = $requete->rowCount();
                echo "<p>il y a '$nbEmployes employes dans l'entreprise</p>"
                ?>
<!--  -->
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
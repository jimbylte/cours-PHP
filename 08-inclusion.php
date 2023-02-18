<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>PHP - Inclusion de fichiers</title>
</head>

<body>


<?php
include('header.inc.php');
?>


<main class="container">
            
            <nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2" href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link m-2" href="06-array.php">array</a>
                <a class="nav-link active m-2" aria-current="page" href="08-inclusion.php">inclusion</a>
                <a class="nav-link m-2" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link m-2" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link m-2" href="session.php">Session de connection</a>
                <a class="nav-link m-2" href="07-exercices.php">exercices</a>
            </nav>

        <h2>La propriété include</h2>

        <p>Ici nous avons inclus notre fichier header.inc.php qui contient le jumbotron grâce à la fonction <code>include</code>. Cette fonction prendra comme seul argument le chemin de notre fichier. Lorsque l'on inclus un fichier, si c'est le seul php, on verra souvent le code sur une seule ligne :</p>

        
<?php
include_once('coucou.inc.php');
?>
        <p><code>include_once()</code> est une fonction prédéfinie qui s'appuie sur include et qui a donc le même champ d'action à une différence près : lorsqu'on utilise cette fonction, le fichier appelé ne peut l'être qu'une fois dans la page. </p>

        <h2>La propriété require</h2>

        <p><code>require</code> s'utilise de la même façon que include : <code>require('nomfichier.inc.php');</code>Il existe aussi la fonction prédéfinie <code>require_once()</code>. La différence principale entre require et include est le type d'erreur qu'ils vont générer. Quand include signifie juste "inclus ce fichier", require lui signifie 'fichier obligatoire', l'erreur sera donc plus importante s'il y a en a une : </p>
        <ul>
            <li>include fera une erreur mais qui n'empêchera pas la suite de la lecture du code</li>
            <li>require provoquera une erreur fatale qui arrêtera complètement l'exécution du code</li>
            <li>_once prendra la même erreur que le parent direct (si c'est un include_once ce sera un warning, si c'est require_once ce sera une erreur fatale).</li>
        </ul>

        <p>On utilisera ces fonctions prédéfinies notamment pour appeler des fichier qui nous serviront souvent dans les pages : </p>
        <ul>
            <li>le footer qui revient identique sur toutes les pages de notre site</li>
            <li>notre connexion à la BDD : <code>init.inc.php</code></li>
            <li>notre fichier de fonctions que nous avons créer nous même : <code>functions.inc.php</code>. Dans un fichier de fonctions on retrouvera par exemple des fonctions de debuggage, des fonctions de vérification de statut del'utilisateur et de connexion de l'utilisateur.</li>
            <li>dans certains cas, un header qui reviendrait sur plusieurs pages</li>
        </ul>

    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
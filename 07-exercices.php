<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Petits exos d'entraînement</title>
</head>

<body>
<header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
<nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2"href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link m-2" href="06-array.php">array</a>
                <a class="nav-link m-2" href="08-inclusion.php">inclusion</a>
                <a class="nav-link m-2" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link m-2" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link m-2" href="session.php">Session de connection</a>
                <a class="nav-link active m-2" aria-current="page" href="07-exercices.php">exercices</a>
            </nav>
        </section>  
</header>
    <main class="container">
        <p>
            Créez un formulaire dans lequel, on peut choisir parmi 3 objets différents et indiquer leur prix.
            Si vous achetez un "Mac" à plus de 1000€, la remise est de 15% & s'il est à moins de 1000€, la remise est de 10%.
            Si vous achetez un "livre", la remise est de 5%;
            Si vous achetez une TV, la remise est de 2%.

            Une fois le formulaire rempli, annoncer à l'utilisateur sa remise et le prix final de l'objet.
        </p>
<pre>
                <code>
            $objet = $_GET['objet'] ?? NULL; //$_GET['objet']??NULL; 
            en PHP utilise l'opérateur de fusion de null pour vérifier si le paramètre 'objet' 
            a été passé dans l'URL à l'aide de la méthode GET. S'il a été passé, il renverra sa valeur, 
            sinon il renverra NULL.
            $prix = $_GET['prix'] ?? NULL;
            $prix = floatval($prix);
            var_dump($_GET);
            $remise15 = 15;
            $remise10 = 10;
            $remise5 = 5;
            $remise2 = 2;
            $prixF15 = $prix * (1 - $remise15 / 100); 
            $prixF10 = $prix * (1 - $remise10 / 100); 
            $prixF5 = $prix * (1 - $remise5 / 100); 
            $prixF2 = $prix * (1 - $remise2 / 100);

        On va maintenant rentrer (enfin) dans le vif du sujet :'les conditions'

            if (is_numeric($prix)) {
                if ($objet == 'mac') {
                    if ($prix > 0 && $prix <= 1000) 
                    {
                    echo "&lt;p class='alert alert-success'&gt;Le tarif après réduction est de : $prixF10 € après abattement de $remise10 %.&lt;/p&gt;";
                    } elseif ($prix > 1000) 
                    {
                        echo "&lt;p class='alert alert-success'&gt;Le tarif après réduction est de : $prixF15 € après abattement de $remise15 %.&lt;/p&gt;";
                    } else 
                    {
                        echo "&lt;p class='alert alert-danger'&gt;ERREUR &lt;/p&gt;";
                    }
                } elseif ($objet == 'livre' && $prix > 0) 
                {
                    echo "&lt;p class='alert alert-success'&gt;Le tarif après réduction est de : $prixF5 € après abattement de $remise5 %.&lt;/p&gt;";
                } elseif ($objet == 'tv' && $prix > 0) {

                    echo "&lt;p class='alert alert-success'&gt;Le tarif après réduction est de : $prixF2 € après abattement de $remise2 %.&lt;/p&gt;";
                } else {
                    echo "&lt;p class='alert alert-danger'&gt;ERREUR &lt;/p&gt;";
                }
            }
                </code>
            </pre>
            
        <div class="alert alert-success">

            <form action="#" method="GET" class="mb-5 row">

                <div class="col-12 col-md-6">
                    <label for="objet">Objet acheté :</label>
                    <select name="objet" id="objet" class="form-select">
                        <option value="mac">Mac</option>
                        <option value="livre">Livre</option>
                        <option value="tv">Télévision</option>
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label for="prix">Prix de l'objet :</label>
                    <input type="text" name="prix" id="prix" class="form-control">
                </div>

                <div class="text-center">
                    <input type="submit" class="btn btn-outline-success mt-3" name="submit">
                </div>

            </form>

            
            <?php



            // global $objet;
            // global $prix;
            $objet = $_GET['objet'] ?? NULL; //$_GET['objet']??NULL; en PHP utilise l'opérateur de fusion de null pour vérifier si le paramètre 'objet' a été passé dans l'URL à l'aide de la méthode GET. S'il a été passé, il renverra sa valeur, sinon il renverra NULL.
            $prix = $_GET['prix'] ?? NULL;
            $prix = floatval($prix);
            // $prix = (int)$prix;
            var_dump($_GET);
            // echo gettype($prix);
            // echo $objet;
            // echo $prix;
            $remise15 = 15;
            $remise10 = 10;
            $remise5 = 5;
            $remise2 = 2;
            $prixF15 = $prix * (1 - $remise15 / 100); //
            $prixF10 = $prix * (1 - $remise10 / 100); //
            $prixF5 = $prix * (1 - $remise5 / 100); // 
            $prixF2 = $prix * (1 - $remise2 / 100); //
            // On va maintenant rentrer (enfin) dans le vif du sujet :'les conditions'
            if (is_numeric($prix)) {
                // var_dump($_GET);
                if ($objet == 'mac') {
                    if ($prix > 0 && $prix <= 1000) {

                        echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF10 € après abattement de $remise10 %.</p>";
                    } elseif ($prix > 1000) {

                        echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF15 € après abattement de $remise15 %.</p>";
                    } else {
                        echo "<p class='alert alert-danger'>ERREUR </p>";
                    }
                } elseif ($objet == 'livre' && $prix > 0) {

                    echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF5 € après abattement de $remise5 %.</p>";
                } elseif ($objet == 'tv' && $prix > 0) {

                    echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF2 € après abattement de $remise2 %.</p>";
                } else {
                    echo "<p class='alert alert-danger'>ERREUR </p>";
                }
            }
            ?>

        </div>

        <br><br><br>

        <p>
            En PHP, dans un select, afficher 31 options ( comme si c'était les jours d'un mois).
        </p>

            <pre>
                <code>
                    echo "&lt;select name='f' selected&gt;";
                        echo "&lt;option value='f'&gt;Séléctionnez une date&lt;/option&gt;";

                    for ($i = 1; $i <= 31; $i++) 
                    {
                        echo "&lt;option value='$i'&gt;jour $i&lt;/option&gt;";
                    }
                </code>
            </pre>

        
            <?php

            // echo "<select>";

            echo "<select name='f' selected>";
                    echo "<option value='f'>Séléctionnez une date</option>";

            for ($i = 1; $i <= 31; $i++) {

                echo "<option value='$i'>jour $i</option>";
            }


            //  echo "</select>";


            ?>

        </select>
        <br><br><br>

        <p>
            Faites un petit formulaire qui demande la langue que parle la personne. Si anglais, afficher hello, si espagnol, afficher holà, si allemand, afficher hallo, si la personne dit arabe, afficher Salam, si la personne parle roumain, afficher Buna ziua, et si la personne dit code, afficher "bonjour" dans une balise p.
        </p>

        <pre>
            <code>
            if (isset($_POST['envoi'])) 
            {
            $langue = $_POST['langue'];    je récupère la langue que la personne a mis 
            if ($langue == 'anglais') 
            {
                echo "&lt;p&gt;Hello&lt;/p&gt;";

            } elseif ($langue == 'espagnol') 
            {
                echo "&lt;p&gt;Holà&lt;/p&gt;";

            } elseif ($langue == 'allemand') 
            {
                echo "&lt;p&gt;Hallo&lt;/p&gt;";

            } elseif ($langue == 'arabe') 
            {
                echo "&lt;p&gt;Salam&lt;/p&gt;";

            } elseif ($langue == 'roumain') 
            {
                echo "&lt;p&gt; Buna ziua&lt;/p&gt;";

            } else {
                echo "&lt;p&gt;&lt;p&gt;Bonjour&lt;/p&gt;&lt;/p&gt;";
            }
        }
            </code>
        </pre>

        <form action="#" method="POST">
            <label for="langue">Quelle langue parlez-vous ?</label>
            <select name="langue" id="langue" class="form-select">
                <option value="langue">Langue parlée</option>

                <option value="anglais">English</option>
                <option value="espagnol">Español</option>
                <option value="allemand">Deutsche</option>
                <option value="arabe">عرب</option>
                <option value="roumain">Română</option>
                <option value="code">&lt;p>Bonjour&lt;p></option>
            </select>

            <input type="submit" name="envoi" class="btn btn-success">
        </form>

        <?php

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        if (isset($_POST['envoi'])) {
            $langue = $_POST['langue']; /* je récupère la langue que la personne a mis */
            if ($langue == 'anglais') {
                echo "<p>Hello</p>";
            } elseif ($langue == 'espagnol') {
                echo "<p>Holà</p>";
            } elseif ($langue == 'allemand') {
                echo "<p>Hallo</p>";
            } elseif ($langue == 'arabe') {
                echo "<p>Salam</p>";
            } elseif ($langue == 'roumain') {
                echo "<p> Buna ziua</p>";
            } else {
                echo " Bonjour ";
            }
        }
        ?>

        <br><br><br><br>

        <p>
            Faire une boucle for qui affiche de 0 à 9 sur une ligne puis complétez cette boucle pour mettre ces chiffres dans un tableau HTML.
        </p>
        <br><br>
        <pre>
            <code>
            echo "&lt;table class='table table-striped'&gt;";
            echo "&lt;tr&gt;";

            for ($i = 0; $i < 10; $i++) {
            echo "&lt;td&gt;$i&lt;/td&gt;";
            }

            echo "&lt;/tr&gt;";
            echo "&lt;/table&gt;";
            </code>
        </pre>
        <br>

        
        <?php

        echo "<table class='table table-striped'>";

        echo "<tr>";

        for ($i = 0; $i < 10; $i++) {
            echo "<td>$i</td>";
        }

        echo "</tr>";

        echo "</table>";

        ?>
        

        <br><br><br>

        <p>
            Déclarez deux tableaux en PHP (acteurs : Dalio, Gabin, Arietty, Fernandel et Carton)
            (pays : France, Angleterre, Espagne, Portugal et Roumanie) 
            et les afficher grâce à une boucle foreach dans une li pour le premier et 
            dans un tableau pour le second.
        </p>
<pre>
    <code>
        1 - Déclaration des array
        $acteurs = ['Dalio', 'Gabin', 'Arrietty', 'Fernandel', 'Carton'];

        $pays = array('France', 'Angleterre', 'Espagne', 'Portugal');

        $pays[] = 'Roumanie';

        2 - Affichage du contenu dans une li pour $acteurs 

        echo "&lt;ul&gt;";

        foreach ($acteurs as $cle => $valeur) // lorsque je ne demande l'affichage que d'une variable, 
        je demande l'affichage de la valeur et pas de l'index. 
        Le mot clé as est toujours obligatoire
        { 
            echo "&lt;li&gt;$cle : $valeur&lt;/li&gt;";
        }

        echo &lt;/ul&gt;";  
    </code>
</pre>

        <?php

        // 1 - Déclaration des array
        $acteurs = ['Dalio', 'Gabin', 'Arrietty', 'Fernandel', 'Carton'];

        $pays = array('France', 'Angleterre', 'Espagne', 'Portugal');

        $pays[] = 'Roumanie';

        // echo "<pre>";
        // var_dump($acteurs);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($pays);
        // echo "</pre>";


        // 2 - Affichage du contenu dans une li pour $acteurs puis dans un table pour $pays grâce à la boucle foreach

        echo "<ul>";

        foreach ($acteurs as $cle => $valeur) { // lorsque je ne demande l'affichage que d'une variable, je demande l'affichage de la valeur et pas de l'index. le mot clé as est toujours obligatoire
            echo "<li>$cle : $valeur</li>";
        }

        echo "</ul>";
        ?>
<pre>
    <code>

        puis dans une table pour $pays grâce à la boucle foreach

        &lt;table class="table table-striped"&gt;
            &lt;?php

            foreach ($pays as $valeurPays) {
                echo "&lt;tr&gt;&lt;td&gt;$valeurPays&lt;/td&gt;&lt;/tr&gt;";
            }

            ?&gt;
        &lt;/table&gt;
    </code>
</pre>

        <table class="table table-striped">
            <?php

            foreach ($pays as $valeurPays) {
                echo "<tr><td>$valeurPays</td></tr>";
            }

            ?>
        </table>

        <br><br><br>
        <p>
            Déclarez un tableau associatif ou l'index prenom correspond à Victor, nom : Hugo, email : victor@free.fr, et n° de tel : 01 43 58 82 74. Affichez ensuite les informations dans des li
            puis dans des paragraphes, sauf le prénom qui doit être dans un h3.
        </p>
<pre>
    <code>
        1 - Déclaration du tableau associatif

    &lt;?php 
$victorHugo = [
    'prenom' => 'Victor',
    'nom' => 'Hugo',
    'mail' => 'victor@free.fr',
    'tel' => '0143588274',
    ];

echo "&lt;ul&gt;";
foreach ($victorHugo as $indiceHugo => $valeurHugo) 
{
    echo "&lt;li&gt;Pour l'indice $indiceHugo, la valeur est $valeurHugo&lt;/li&gt;";
}
echo "&lt;/ul&gt;";
    </code>
</pre>

        <?php //1 - Déclaration du tableau associatif

        $victorHugo = [
            'prenom' => 'Victor',
            'nom' => 'Hugo',
            'mail' => 'victor@free.fr',
            'tel' => '0143588274',

        ];

        echo "<ul>";
        foreach ($victorHugo as $indiceHugo => $valeurHugo) {
            echo "<li>Pour l'indice $indiceHugo, la valeur est $valeurHugo</li>";
        }
        echo "</ul>";

        ?>
<pre>
    <code>

    

foreach ($victorHugo as $indiceVictor => $valeurVictor) 
{
    if ($indiceVictor == 'prenom') {
        echo "&lt;h3&gt;$valeurVictor&lt;/h3&gt;";
    } else {
        echo "&lt;p&gt;$valeurVictor&lt;/p&gt;";
    }
}
?&gt;
    </code>
</pre>
<?php
        foreach ($victorHugo as $indiceVictor => $valeurVictor) {
            if ($indiceVictor == 'prenom') {
                echo "<h3>$valeurVictor</h3>";
            } else {
                echo "<p>$valeurVictor</p>";
            }
        }
        ?>







    </main>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
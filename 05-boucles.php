<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Les boucles en  PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <header class="p-5 mb-4 bg-light">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">
                Les boucles
            </h1>
            <p class="col-md-8 fs-4">
                Les boucles ( que l'on appelle aussi structures itératives ) sont un moyen de faire se répéter plusieurs fois un morceau de code. Une boucle est donc une répétition, comme on a pu le voir en JavaScript.
            </p>
        </section>
    </header>
    <main class="container">
        <section class="row">
            <div class="col-12">
                <h2>La boucle WHILE</h2>
                <p>
                    La boucle WHILE est, comme en JS, une boucle qui permet d'exécuter un code TANT QUE la condition d'entrée est tjrs remplie.
                </p>
                <?php
                $a = 0; /* Initialisation de la variable à 0  */
                while($a < 5)
                {/* on boucle tant que $a est inférieur à 5*/
                echo "<p>Tour n°$a </p>"; /* On affiche à quel tour on se trouve  */
                $a++; /* On incrémente notre valeur à chaque passage de la boucle */
                //Autre solution :
                // echo "<p>Tour n°</p>" . $a++;
                }
                ?>
            </div>
            <div class="col-12">
                <h2>
                    La boucle DO WHILE
                </h2>
                <p>
                    Cette boucle fonctionne avec la même instruction que la boucle <em>WHILE</em> : TANT QUE. Cependant pour cette boucle la condition est testée à la fin et pas au début.
                </p>
                <p>
                    Faites une boucle DO WHILE qui s'exécute TANT QUE $i (qui vaut 0 à sa déclaration) est inférieure à 1.
                </p>
                <?php
                $i = 0;// Déclaration et initialisation de la variable.
            do{//Ici on exécute d'abord cette première partie avant même de regarder la condition.*/
                echo "<p>$i</p>"; // J'affiche la valeur de "i"
                $i++; // J'incrémente 
            } while ($i < 10); // Je donne la condition, si elle a déjà été remplie, mon script s'arrête à cette endroit. Sinon la boucle recommence jusqu'à ce que la condition soit remplie.
                
                ?>
            </div>
            <div class="col-12">La boucle FOR</div>
            <div class="col-12">
                <p>Comme toutes les boucles, la boucle for sert à répéter un morceau de code TANT QUE la condition n'est pas respectée.
                Sa structure est cependant différente.
                </p>
                <ol>
                    <li>Initiation de la variable</li>
                    <li>Condition de sortie</li>
                    <li>Incrémentation de la variable</li>
                </ol>
                <p>
                    Faites une boucle FOR qui s'exécute TANT QUE la variable $b, qui vaut 0 au départ, est inférieure à 15.
                    Le code est le suivant : "tour n° + numéro du tour"
                </p>
                <?php
                // $b = 0;
                for ($b = 0; $b < 15; $b++){
                    echo "<p>Tour n°$b</p>";
                    // $b++;
                }
                
                
                //1-$b = 0;
                //2-test(condition) => 0 < 15 ? VRAI
                //3-affichage $b => $b =>0;
                //4-Incrémentation => $b++ => 0 + 1 => 1;
                //2-Test(condition)
                //3-affichage
                //Incrémentation
                ?>

                <h2>La boucle foreach</h2>
                <p>La boucle foreach sert à parcourir un tableau (array() ou []). On verra cette boucle plus en détails dans la page dédiée aux array(). </p>

                <p class="alert alert-danger">Attention. Lorsque que vous faites une boucle, vérifiez votre condition de sortie ainsi que l'incrémentation de votre variable. Sans incrémentation, vous aurez une boucle infinie.</p>

                <p class="alert alert-secondary">A force d'utilier les boucles, il sera de plus en plus logique de choisir telle ou telle boucle pour tel ou tel usage. </p>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

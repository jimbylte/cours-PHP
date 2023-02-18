<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Les array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <header class="p-5 mb-4 bg-light">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Les Array</h1>
            <p class="col-md-8 fs-4">Les tableaux, appelés array() dans les langages de programmation sont extrêmement importants car ils permettent de garder en mémoire plusieurs valeurs</p>

            <nav class="navbar navbar-expand-lg bg-tertiary">
                <a class="nav-link m-2" aria-current="page" href="01-index.html">introduction</a>
                <a class="nav-link m-2" href="03-variable.html">variables</a>
                <a class="nav-link m-2" href="05-boucles.php">boucles</a>
                <a class="nav-link active m-2" aria-current="page" href="06-array.php">array</a>
                <a class="nav-link m-2" href="08-inclusion.php">inclusion</a>
                <a class="nav-link m-2" href="09-get_post.php">Les superglobales</a>
                <a class="nav-link m-2" href="10-pdo.php">Le PHP Data Object (PDO)</a>
                <a class="nav-link m-2" href="session.php">Session de connection</a>
                <a class="nav-link m-2" href="07-exercices.php">exercices</a>
            </nav>

        </section>
    </header>
    
    <main class="container">
        <h2>A quoi sert un tableau</h2>
        <p>
            La différence majeure entre une variable et un array est que, dans ce dernier, on peut garder en mémoire plusieurs valeurs.
        </p>
        <?php
            $prenom = "jasmine";
            echo "bonjour princesse $prenom";
            $listeprenoms = array("Grégoire", "Sidonie", "Jacqueline");
            echo "<p class='alert alert-success'>bonjour $listeprenoms[2]</p>"; //Affiche Bonjour Jacqueline

        ?>
        <h2>Exemple avec un tableau prédéfini</h2>
        <code>
        $listePays[] = "France";<br>
        $listePays[] = "Angleterre";<br>
        $listePays[] = "Espagne";<br>
        $listePays[] = "Maroc";<br>
        </code><br>
        <p>
            La fonction VAR_DUMP permet d'afficher les clefs, type, n°de charactère (longueur), et valeurs du tableau.
        </p>
        <code>
            var_dump($listePays);
        </code><br>
        <?php
        $listePays[] = "France";
        $listePays[] = "Angleterre";
        $listePays[] = "Espagne";
        $listePays[] = "Maroc";
        
        var_dump($listePays);
        echo "<br><br>";
        echo "<p>Et l'utilisation de la balise <strong>pre</strong> permet de formater l'affichage d'une façon plus simple à visualiser. </p>";
        
        ?>

        <code>
        echo "< pre>";<br>
            var_dump($listePays);<br>
        echo "< /pre>";<br><br>
        </code>

        <?php
        echo "<pre>";
            var_dump($listePays);
        echo "</pre>";

        echo"<p>Idem pour PRINT_R qui n'affiche que les clefs et les valeurs correspondantes</p>";
        //print_r est instruction d'affichage améliorée permettant de voir le contenu d'un tableau array
        
        ?>
        <code>
        echo "< pre>";<br>
            print_r($listePays);<br>
        echo "< /pre>";<br><br>
        </code>
        <?php
        echo "<pre>";
            print_r($listePays);
        echo "</pre>";
        


//-------------------------------------------


?>
<h2>Parcourir les tableaux grâce aux boucles</h2><br>

<h3>La boucle FOR</h3>
<p>La boucle FOR va permettre de parcourir un "array", et extraire les données pour les afficher sous la forme demandée.</p>
<p>Afficher uniquement les valeurs d'un tableau</p>
<br>
<code>
$listeFournitures = array('stylos', 'crayons de papier', 'surligneurs', 'feutres', 'règles');<br><br>
</code>

<p>Afficher uniquement les valeurs d'un tableau</p>

<code>
   for ($j = 0; $j < count($listeFournitures); $j++){
    echo "$listeFournitures[$j]";
   }<br>
</code>

<?php

$listeFournitures = array('stylos', 'crayons de papier', 'surligneurs', 'feutres', 'règles');

   for ($j = 0; $j < count($listeFournitures); $j++){
    echo "$listeFournitures[$j] <br>";
   }
   echo "<br>";
   echo "<p>On utilise la fonction COUNT() ou la fonction SIZEOF() pour obtenir la taille du tableau</p>";
   ?>   
<code>
count($listeFournitures);
</code>

<?php
    echo "<br>";
    echo count($listeFournitures) ."<br>"; // la taille du tableau
    echo "<br>";
    ?>
    <code>
    sizeof($listeFournitures);
    </code>
    <?php
    echo "<br>";
    echo sizeof($listeFournitures) ."<br>"; // la taille du tableau
    echo "<br>";

    echo "<p>La boucle suivante fera apparaître les valeurs du tableau </p>";
?>
   <code> for($j = 0; $j < count($listeFournitures); $j++){
       
       echo $listeFournitures[$j];
   }
   </code>
<?php
    echo "<br>";
    for($j = 0; $j < count($listeFournitures); $j++){
        
        echo "$listeFournitures[$j] <br>";
    }
   // $j = 0 => (condition)0 < 5 => code(traitement)-> Affichage $listeFournitures[0] -> valeur "stylo"
   // $j++ => 0+1 =1 => (condition) 1 < 5 => Affichage -> $listeFournitures[1] -> valeur "crayons de papier"
   // $j++ => 1+1 =2 => (condition) 2 < 5 => Affichage -> $listeFournitures[2] -> valeur "surligneurs"
   // $j++ => 2+1 =3 => (condition) 3 < 5 => Affichage -> $listeFournitures[3] -> valeur "feutres"
   // $j++ => 3+1 =4 => (condition) 4 < 5 => Affichage -> $listeFournitures[4] -> valeur "régle"
   // $j++ => 4+1 =5 => (condition) 5 < 5 => false => il sort de la boucle.
       
   echo "<br>";
   echo "<p>Avec un nouveau tableau</p>";
   ?>
   <code>
    for( $n=0; $n < count($listeNoms); $n++){
    echo $listeNoms[$n];
   }
   </code>
<?php
echo "<br>";
   $listeNoms[]='MIADANNA';
        $listeNoms[]='GARMA';
        $listeNoms[]='DRISS';
        $listeNoms[]='SOUKOUNA';
        $listeNoms[]='AKHTAR';
        $listeNoms[]='BOUKHOBZA';
        $listeNoms[]='HERREROS';
        $listeNoms[]='SADIA';
        $listeNoms[]='BODIN';
        $listeNoms[]='RABEHARIMALALA';
        $listeNoms[]='BIZIRA';
        $listeNoms[]='ZOCCHI';
        $listeNoms[]='ABDERAMANE';
        $listeNoms[]='DJEDIDEN';
        $listeNoms[]='KOUIDRI';
        $listeNoms[]='HUNAULT';
        for($n=0;$n<count($listeNoms);$n++){
            echo "$listeNoms[$n]<br>";
        }
echo "<br>";
echo "<p>Avec un nouveau tableau Multidimentionnel et un code utilisant PRINT_R ou VAR_DUMP</p>";
?>
<code>
for($t=0; $t < count($tabMultidimentionnel);$t++){ <br>
    echo "< pre>";<br>
       print_r($tabMultidimentionnel[$t]["NOM"] . " " .$tabMultidimentionnel[$t]["Prénom"] . " ". $tabMultidimentionnel[$t]["Poste"]);<br>
    echo "< /pre>";<br>
}
</code>
<?php
echo "<br><br>";
        $tabMultidimentionnel=array(0=>array("NOM"=>"MIADANNA","Prénom"=>"Aina","Poste"=>"Conseiller d'Insertion professionelle"), 1=>array("NOM"=>"GARMA","Prénom"=>"Ali","Poste"=>"Développeur<br>"),
2=>array("NOM"=>"DRISS","Prénom"=>"Aurélie","Poste"=>"Développeur"),
3=>array("NOM"=>"SOUKOUNA","Prénom"=>"Djiri","Poste"=>"Développeur"),
4=>array("NOM"=>"AKHTAR","Prénom"=>"Hassan","Poste"=>"Développeur"),
5=>array("NOM"=>"BOUKHOBZA","Prénom"=>"Jacques","Poste"=>"Développeur"),
6=>array("NOM"=>"HERREROS","Prénom"=>"Jimmy","Poste"=>"Développeur"),
7=>array("NOM"=>"SADIA","Prénom"=>"Karim","Poste"=>"Développeur"),
8=>array("NOM"=>"BODIN","Prénom"=>"Laêticia","Poste"=>"Développeur"),
9=>array("NOM"=>"RABEHARIMALALA","Prénom"=>"Mamitianna","Poste"=>"Développeur"),
10=>array("NOM"=>"BIZIRA","Prénom"=>"Ny Ony","Poste"=>"Développeur"),
11=>array("NOM"=>"ZOCCHI","Prénom"=>"Ophélia","Poste"=>"Développeur"),
12=>array("NOM"=>"ABDERAMANE","Prénom"=>"Sandaa","Poste"=>"Développeur"),
13=>array("NOM"=>"DJEDIDEN","Prénom"=>"Yacine","Poste"=>"Encadrant Technique"),
14=>array("NOM"=>"KOUIDRI","Prénom"=>"Mohamed","Poste"=>"Développeur"),
15=>array("NOM"=>"HUNAULT","Prénom"=>"Souleiman","Poste"=>"Développeur"),
16=>array("NOM"=>"ISOLA","Prénom"=>"Patrick","Poste"=>"Responsable de l'encadrement Technique"));
for($t=0;$t<count($tabMultidimentionnel);$t++){
    echo"<pre>";
       print_r($tabMultidimentionnel[$t]["NOM"] . " " .$tabMultidimentionnel[$t]["Prénom"] . " ". $tabMultidimentionnel[$t]["Poste"]);
    echo"</pre>";
}
        ?>

        <h3>La boucle FOREACH</h3>
        <p>
            La boucle FOREACH est plus adaptée lorsque l'on parcoure un tableau, mais c'est aussi la plus complexe à comprendre. ELle vient avec ses "mots" et "symboles" "clefs" que nous verrons après l'exemple. C'est la boucle la plus adaptée aux tableaux car on est pas obligé de fournir un numéro pour l'index.
        </p>
<!-- afin de créer l'aperçu on peut remplacer les symbole "<" et ">" par leur code correspondants "&lt;" et "&gt;", ce sont les entités HTML "HTML entities" -->
        <ul>
            <code>
            <pre>
            &lt;?php
            foreach($listeFournitures as $indiceTableau => $objetTableau)
            {
                echo "&lt;li&gt;$indiceTableau - $objetTableau&lt;/li&gt;";
            }

            ?&gt;
            </pre>
            </code>
        
        </ul>

        <ul>
            <?php
            foreach($listeFournitures as $indiceTableau => $objetTableau)
            {
                echo "<li>$indiceTableau - $objetTableau</li>";
            }

            ?>
        </ul>

        <p>La boucle foreach s'écrit toujours de la même façon. Entre les parenthèses, nous retrouverons d'abord le nom de la variable contenant un tableau. Vient ensuite le mot clé <code>as</code>, prédéfinit dans le langage PHP. Il précède la variable qui va contenir l'index du tableau. On peut donner le nom que l'on veut aux deux variables suivantes ($indiceTableau et $objetTableau), elles pourraient très bien s'appeler "piscine" et "chlore", ou encore "index" et "valeur". C'est leur emplacement qui indique à quoi elles servent. Entre ces deux variables on retrouve la flèche <code>=></code> qui, comme on l'a déjà vu, signifie "correspond à". </p>
        <p>En résumé, dans la parenthèse de la boucle foreach je trouverai : <code>$variableTableau as $indexTableau => $valeurTableau</code>.</p>

        <h2>
            Les tableaux associatifs
        </h2>
        <p>
            Il est possible, lorsque l'on crée un tableau de choisir les index plutôt que de les avoir définis automatiquement. On parlera alors de tableau associatif.
        </p>
            <code>
            $listeCouleur =["j" => "jaune",
                            "b" => "bleu",
                            "v" => "vert"
                            ];
            </code>
            <code>
        echo "<p>Ma couleur préférée est le :" .  $listeCouleur["j"] . "</p>";                     
        </code>
        <?php
            $listeCouleur =["j" => "jaune",
                            "b" => "bleu",
                            "v" => "vert"
                            ];
        
        // Aficher "ma couleur préférée est le jaune
        echo "<p>Ma couleur préférée est le :" .  $listeCouleur["j"] . "</p>";  
              
        //Même chose que précédemment sauf que l'index de mon tableau est la lettre "j"
        ?>
        <p>
            Avec un tableau associatif, nous utiliseronts tjrs les crochets mais c'est l'index que nous avons déclaré qui prendra le pas.
        </p>

        <h2>
            Les tableaux multidimentionnels
        </h2>
        <p>
            Il est possible de créer des tableaux à l'intérieur d'autres tableaux grâce à l'imbrication :
            C'est alors un tableau multidimentionnel.
        </p>
       <code> <pre>
        $tabMulti = array(
            0 => ['prénom' => 'Hassan',
                    'nom' => 'akhtar'],
            1 => ['prénom' => 'Ophélia',
                    'nom' => 'Loron'],
            2 => ['prénom' => 'Souleiman',
                    'nom' => 'Hunault'],
            3 => ['prénom' => 'Aurélie',
                    'nom' => 'Driss']     
        );
        </pre></code>
        
        <?php //tableau multidimentionnels
        $tabMulti = array(
            0 => ['prenom' => 'Hassan',
                    'nom' => 'akhtar'],
            1 => ['prenom' => 'Ophélia',
                    'nom' => 'Loron'],
            2 => ['prenom' => 'Souleiman',
                    'nom' => 'Hunault'],
            3 => ['prenom' => 'Aurélie',
                    'nom' => 'Driss']     
        );
        echo "<br><br>";
        echo "<pre>";
        print_r($tabMulti);
        echo "</pre>";
            
        // Afficher "Bonjour Mme Driss"
?>
    <p>Afficher "Bonjour Mme. Driss</p>
    <code>
    echo "&lt;pre&gt;";<br>
    echo "&lt;p&gt;Bonjour Mme. " . $tabMulti[3]["nom"] . "&lt;/p&gt;";<br>
    echo "&lt;/pre&gt;";</code><br><br>
<?php
        echo "<p>Bonjour Mme. " . $tabMulti[3]["nom"] . "</p>";

        // Afficher le tableau à l'aide de la boucle FOR
?>
<p>Afficher le tableau à l'aide de la boucle FOR</p>
    <code><pre>
    for($i = 0; $i < count($tabMulti); $i++){
    echo "&lt;pre&gt;"; 
    var_dump($tabMulti[$i]);
    echo "&lt;/pre&gt;";<br>    };
    </pre></code>
<?php
        for($i = 0; $i < count($tabMulti); $i++)
        {
            echo "<pre>";
            var_dump($tabMulti[$i]);
            echo "</pre>";
        }
        echo "<ul>";
        foreach($tabMulti as $indiceTabMulti => $objetTabMulti)
            {
                echo "<li>$indiceTabMulti - $objetTabMulti[prenom] $objetTabMulti[nom]</li>";
                // echo "<li>".$indiceTabMulti ." - ".$objetTabMulti["prenom"]." ". $objetTabMulti["nom"]."</li>";
                // echo "<li>{$indiceTabMulti} - {$objetTabMulti["prenom"]} {$objetTabMulti["nom"]}</li>";
                // `Hello, my name is ${name}`
            }
         echo "</ul>";

        ?>
        <!--correction----------------------------------->
        <p>correction</p>
        
              
                <ul>
                    <code>
                    <?php
                    foreach($tabMulti as $index => $personnes)
                    {
                        echo "<li>";
                        echo $index . "=>";
                        
                        foreach($personnes as $champ => $valeurChamp)
                        {
                            echo   "$champ : $valeurChamp ,";
                        } 
                        echo "</li>";
                    }
                    ?></code>
                </ul>
            
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

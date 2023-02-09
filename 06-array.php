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
echo "<p>Afficher uniquement les valeurs d'un tableau</p>";

?>
<code>
$listeFournitures = array('stylos', 'crayons de papier', 'surligneurs', 'feutres', 'règles');<br><br>

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
   echo "<p>On utilise la fonction COUNT() pour obtenir la taille du tableau</p>";
   ?>   
<code>
count($listeFournitures);
</code>

<?php
    echo "<br>";
    echo count($listeFournitures) ."<br>"; // la taille du tableau
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
        
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

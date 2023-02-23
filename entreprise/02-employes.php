<?php

$pdoEntreprise = new PDO(
    'mysql:host=localhost;
    dbname=entreprise', 
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    )
);

?>

<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Entreprise - Les employés</title>

</head>

<body>
    <!-- jumbotron-fluid -->
    <header class="p-5 mb-4 bg-light rounded-3">
        <section class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Entreprise - Les employés</h1>
            <p class="col-md-8 fs-4">Dans cette page, nous allons afficher les employés de notre entreprise ainsi qu'un formulaire pour rajouter des nouveaux employés. </p>
            <a class="btn btn-primary btn-lg" href="01-entreprise.php">Accueil</a>
        </section>
    </header><!-- fin du jumbotron -->

    <main class="container">
        <section class="row my-5">
        
        <?php
        //notre première requete
        $requete = $pdoEntreprise->query("SELECT * FROM employes") ;       
        ?>
        <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <!-- th*8 -->
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Genre</th>
                        <th>Service</th>
                        <th>Date d'embauche</th>
                        <th>Salaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                /*
                    while($employes = $requete->fetch(PDO::FETCH_ASSOC)){
                        //FETCH_ASSOC est une méthode qui permet de récupérer les informations dans notre BDD en les liant par enregistrement
                        echo "<tr>";
                        echo "<td>". $employes['id_employes'] ."</td>"; // je récupère l'id qui correspond au premier enregistrement de ma requête
                        echo "<td>". $employes['prenom'] ."</td>";
                        echo "<td>". $employes['nom'] ."</td>";
                        
                        echo "<td>";
                                               
                        //on fait une condition en PHP 
                        /* si le sexe est f dans la bdd alors je dis d'afficher femme sinon c'est forcément h et je demande d'afficher homme */
                       /* if($employes['genre'] == 'f'){
                            echo "Femme";
                        }else {
                            echo "Homme";
                        }
                                            
                        echo "</td>";
                        
                        echo "<td>". $employes['service'] ."</td>";
                        echo "<td>". date('d/m/y', strtotime($employes['date_embauche'])) ."</td>";
                        // ici on utilise une fonction prédéfinie date(). Cette fonction PHP prend deux arguments : le format de la date, deuxième argument la date que l'on veut modifier. On peut préciser une date nous-même ou alors récupérer une date depuis la BDD. 
                        echo "<td>". $employes['salaire'] ." €</td>";
                    
                        echo "<td>
                        <a href='03-employe.php?id_employes=". $employes['id_employes'] ."' class='btn btn-primary mx-3'>
                        
                        Voir l'employé
                        
                        </a>

                        <a href='02-employes.php?action=suppression&id_employes=' " . $employes['id_employes'] ." class='btn btn-danger mx-3' onclick='return(confirm(\"Êtes-vous sûr de vouloir supprimer cet employé ?\"))'>

                        Supprimer l'employé

                        </a>
                        
                        </td>";
                    
                        echo "</tr>";
                    }
                    */
                    // $employes = $requete->fetchAll (PDO::FETCH_ASSOC)
                    $employes = $requete->fetchAll (PDO::FETCH_ASSOC);

                    
                    foreach($employes as $cle => $value){
                        echo "<pre>";
                        var_dump($employes);
                        echo "</pre>";
                        //FETCH_ASSOC est une méthode qui permet de récupérer les informations dans notre BDD en les liant par enregistrement
                        echo "<tr>";
                        echo "<td>". $value['id_employes'] ."</td>"; // je récupère l'id qui correspond au premier enregistrement de ma requête
                        echo "<td>". $value['prenom'] ."</td>";
                        echo "<td>". $value['nom'] ."</td>";
                        
                        echo "<td>";
                                               
                        //on fait une condition en PHP 
                        /* si le sexe est f dans la bdd alors je dis d'afficher femme sinon c'est forcément h et je demande d'afficher homme */
                        if($value['genre'] == 'f'){
                            echo "Femme";
                        }else {
                            echo "Homme";
                        }
                                            
                        echo "</td>";
                        
                        echo "<td>". $value['service'] ."</td>";
                        echo "<td>". date('d/m/y', strtotime($value['date_embauche'])) ."</td>";
                        // ici on utilise une fonction prédéfinie date(). Cette fonction PHP prend deux arguments : le format de la date, deuxième argument la date que l'on veut modifier. On peut préciser une date nous-même ou alors récupérer une date depuis la BDD. 
                        echo "<td>". $value['salaire'] ." €</td>";
                    
                        echo "<td>
                        <a href='03-employe.php?id_employes=". $value['id_employes'] ."' class='btn btn-primary mx-3'>
                        
                        Voir l'employé
                        
                        </a>

                        <a href='02-employes.php?action=suppression&id_employes=' " . $value['id_employes'] ." class='btn btn-danger mx-3' onclick='return(confirm(\"Êtes-vous sûr de vouloir supprimer cet employé ?\"))'>

                        Supprimer l'employé

                        </a>
                        
                        </td>";
                    
                        echo "</tr>";
                    }
                    
                    ?>
                </tbody>
        
        
        
        
        
         </section>
    </main>









    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-exercice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <main class="container bg-light vh-100 rounded m-5 p-5 text-white">
      <h1 class="container-fluid text-center bg-dark mx-auto my-3 rounded">
          exercice
      </h1>

      <p class="container text-dark">
          Créez un formulaire dans lequel, on peut choisir parmis trois objets différents et indiquez leur prix.
          Si vous achetez un "Mac" à plus de 1000€, la remise est de 15% et si à moins ou égale à 1000€, la remise est de 10%.
          Si vous achetez un "livre", la remise est de 5%;
          Si vous achetez une "TV", la remise est de 2%.

          Une fois le formulaire rempli, annoncez à l'utilisateur sa remise et le prix final de l'objet
      <!--le formulaire contient action et la methode sera get,
  utiliser un select avec options-->
      </p>

<?php
$requete = 1000;
// $remise = NULL;
// $total = NULL;
// echo $_GET['total'];
// echo $_GET['remise'];

  // if(isset($_GET['envoyer'])){    
    if($_GET['liste'] == "mac"){//Si on choisit un mac
      if((int)$_GET['prix'] > $requete){//Si on choisit un montant supérieur à la requete
        $total = (int)$_GET['prix'] - ((int)$_GET['prix']*15/100);
        $remise = "votre remise est de: 15%";
      }elseif((int)$_GET['prix'] <= $requete){
        $total = (int)$_GET['prix'] - ((int)$_GET['prix']*10)/100;
        $remise = "votre remise est de : 10%";
      }
    }elseif($_GET['liste'] == "livre"){
        $total = (int)$_GET['prix'] - ((int)$_GET['prix']*5)/100;
        $remise = "votre remise est de : 5%";
    }elseif($_GET['liste'] == "tv"){
        $total = (int)$_GET['prix'] - ((int)'prix'*2)/100;
        $remise = "votre remise est de : 2%";
    }else{
      $total = "total";
      $remise = "remise";
    }
      
  // }
?>

  <fieldset class="">
    <form action="#" method="GET" class="row">
        <!-- <label for="selection">choisissez un produit </label> -->
        <select class="form-select my-3" name="liste" id="selection">
            <option selected>choisissez un produit</option>
            <option value="mac">Mac</option>
            <option value="livre">Livre</option>
            <option value="tv">TV</option>
        </select>
        <input type="number" name="prix" id="prix" style="width:30%" class="form-control w-25" placeholder="Veuillez saisir un prix" value="<?= htmlentities($_GET['prix']) ?>">
        <button type="submit" name="envoyer" id="envoyer" class="btn btn-primary w-25">envoyer</button>
        <input type="text" name="total" id="total" class="form-control w-25" placeholder="total" value="<?php echo (int)$total; ?>">
        <input type="text" name="remise" id="remise" class="form-control w-25" placeholder="votre remise" value="<?php echo $remise; ?>">
    </form>
 </fieldset>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>




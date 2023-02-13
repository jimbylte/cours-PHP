    

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header></header>
  <main class="container">
    <p>Créez un formulaire dans le quel, on peut choisir parmi trois objets différents et indiquer leur prix.
      si vous achetez un "Mac" à plus de 1000€, la remise est de 15% && si à moins de 1000€, la remise est de 10%.
      Si vous achetez un "livre", la remise est de 5%.
      Si vous achetez une TV, la remise est de 2%.
      Une fois le formulaire rempli, annoncer à l'utilisateur sa remise et le prix final de l'achat.</p>
    <form action="#" methode="GET" id="form">
      <fieldset enabled>
        <legend class="text-center fs-1 fw-bold" id="titre">Calculateur de Prix</legend>
        <div class="mb-3">
          <label for="numberInput" class="form-label">Entrez votre prix</label>
          <input value="0" name="price" type="number" id="Prix" class="form-control" placeholder="Prix de l'article en €uros">
        </div>
        <div class="mb-3">
          <label for="Select" class="form-label">Faites votre choix</label>
          <select name="objet" id="Select" class="form-select">
            <option>--3 produits disponibles--</option>
            <option value="mac">Mac Book Air</option> 
             <= 1000€ => 10% // >1000€ => 15% -->
            <option value="livre">Livre électronique</option> 
            5% 
            <option value="tele">Téléviseur</option> 
             2%
          </select>
        </div>
        <button name="envoi" type="submit" class="btn btn-primary">Ma réduction !!!</button>
      </fieldset>
    </form>
        
        
    <?php  
        if(isset($_GET['envoi'])){ //si le formulaire est soumis via l'attribut name ('envoi') du bouton submit
            // on va récupérer les données (attribut name) de mon formulaire dans des variables
            $objet = $_GET['objet']; 
            $prix = $_GET['price'];
            // On calcule les remises et les prix finaux pour chaque pourcentage 
            $remise15 = 15;
            $remise10 = 10;
            $remise5 = 5;
            $remise2 = 2;
            $prixF15 = $prix*(1-$remise15/100); //
            $prixF10 = $prix*(1-$remise10/100); //
            $prixF5 = $prix*(1-$remise5/100); // 
            $prixF2 = $prix*(1-$remise2/100); //
            // On va maintenant rentrer (enfin) dans le vif du sujet :'les conditions'
            
            if($objet == 'mac'){
              if ($prix > 1000){
                echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF15 € après abatement de $remise15 %.</p>";
              }else{
                echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF10 € après abatement de $remise10 %.</p>";
              }
            }elseif($objet == 'livre'){
              echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF5 € après abatement de $remise5 %.</p>";
            }elseif ($objet == 'tele') {
              echo "<p class='alert alert-success'>Le tarif après réduction est de : $prixF2 € après abatement de $remise2 %.</p>";
            }else {
              echo "<p class='alert alert-danger'>Votre tarif sera calculé une fois que vous aurez saisie votre objet et son montant.</p>";
            }
            
        
          }





        if(isset($objet)){
          ($objet == 'Mac');
        }
        if(isset($objet)){
          ($objet == 'Livre');
        }
        if(isset($objet)){
          ($objet == 'TV');
        }
        $objet = $_GET['objet'];
        echo $objet;
        $prix = $_GET['Price'];
        $pourcentage10 = 10;
        $pourcentage15 = 15;
        $pourcentage5 = 5;
        $pourcentage2 = 2;
        if($prix <= 1000 && $objet == 'Mac'){
          echo "<p class='alert alert-success'>Le tarif après réduction est de : " . $prix * (1 - $pourcentage10 / 100) . "€ T.T.C. après abattement de ". $pourcentage1. " %.</p>";
        }elseif($prix > 1000){
          echo "<p class='alert alert-success'>Le tarif après réduction est de : " . $prix * (1 - $pourcentage15 / 100) . "€ T.T.C. après abattement de ". $pourcentage2. " %.</p>";
        }elseif($objet == 'Livre'){
          echo "<p class='alert alert-success'>Le tarif après réduction est de : " . $prix * (1 - $pourcentage5 / 100) . "€ T.T.C. après abattement de ". $pourcentage3. " %.</p>";
        }elseif($objet == 'TV'){
          echo "<p class='alert alert-success'>Le tarif après réduction est de : " . $prix * (1 - $pourcentage2 / 100) . "€ T.T.C. après abattement de ". $pourcentage4. " %.</p>";
        }else{
          echo "<p class='alert alert-danger'>Votre tarif sera calculé une fois que vous aurez saisie votre objet et son montant.</p>";
        }
        ?>
        
  </main>
  <footer></footer>
  <script type="text/javascript" src="07-mini-exo.js"></script>
</body>

</html>

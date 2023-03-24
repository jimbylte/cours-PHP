<footer class="bg-light">
    <div class="container">
        <section class="row">
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center mx-auto">
                <h2>MonBlog</h2>
            </div>

            <div class="col-12 col-md-4 mx-auto">
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="articles.php">Articles</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-12 col-md-4 mx-auto">
                <form action="#" method="POST" id="form-inscription">
                    <label for="mail">Inscrivez-vous à la newsletter</label>
                    <input type="text" name="mail" id="mail" class="form-control">
                    <p id="afficherErreur" class="text-danger d-none">► Vérifiez votre mail ◄</p>
                    <p id="afficherReussite" class="text-success d-none">Mail valide ♥ </p>
                    <input type="submit" value="Je m'inscris" class="btn btn-primary">
                </form>
                
       </div>
        </section>
    </div>
</footer>
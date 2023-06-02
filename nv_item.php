<!--
    CODE FORMULAIRE AJOUT PRODUIT               envoie sur add_item.php
            CODE FONCTIONNEL
    SOURCES
  
    https://getbootstrap.com/docs/5.3/
    https://getbootstrap.com/docs/5.2/examples/footers/
  
    google maps: https://blog.hubspot.com/website/how-to-embed-google-map-in-html
    https://www.pierre-giraud.com/bootstrap-apprendre-cours/bouton/
  -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compte Agora Francia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="allstyles.css" type="text/css" rel="stylesheet">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <div id="wrapper" class="container-fluid">

        <div id="header" class="container-fluid">

            <img src="logo.png" class="rounded mx-auto d-block" alt="logo">
        </div>

        <div id="navigation" class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-body-tertiary mx-auto">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav mx-auto">
                            <a class="nav-link active px-5" aria-current="page" href="index.php">Accueil</a>
                            <a class="nav-link px-5" href="parcourir.php">Tout Parcourir</a>
                            <a class="nav-link px-5" href="notifications.php">Notifications</a>
                            <a class="nav-link px-5" href="visu_panier.php">Panier</a>
                            <a class="nav-link px-5" href="compte.php">Votre compte</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="container-fluid" id="section">
            <div class="container">
                <br>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Vendeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="compte.html">Acheteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin</a>
                    </li>
                </ul>
                <br>
                <!--FORMULAIRE-->
                <div class="text-center">
                    <h3>Ajout d'un nouveau produit</h3>
                </div>

                <form class="square-form" action="add_item.php" method="post">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" name="nom_obj" id="nom" placeholder="Saisissez le nom de l'article" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">photo 1 :</label>
                        <input type="text" class="form-control" name="photo1" id="prenom" placeholder="ajoutez une photo de l'article" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom">photo 2 :</label>
                        <input type="text" class="form-control" name="photo2" id="prenom" placeholder="ajoutez une photo de l'article">
                    </div>
                    <div class="form-group">
                        <label for="prenom">photo 3 :</label>
                        <input type="text" class="form-control" name="photo3" id="prenom" placeholder="ajoutez une photo de l'article">
                    </div>
                    <div class="form-group">
                        <label for="prenom">photo 4 :</label>
                        <input type="text" class="form-control" name="photo4" id="prenom" placeholder="ajoutez une photo de l'article">
                    </div>

                    <div class="form-group">
                        <label for="descriptio">Description :</label>
                        <input type="text" class="form-control" name="descriptio" id="descriptio" placeholder="Ajoutez une description" required>
                    </div>

                    <div class="form-group">
                        <label for="mdp">Prix :</label>
                        <input type="text" class="form-control" name="prix" id="mdp" placeholder="Saisissez le prix de l'article" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Méthode de vente</label>
                        </div>
                        <select name="methode_vente" class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Enchères</option>
                            <option value="2">Négociations</option>
                            <option value="3">Vente immédiate</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                        </div>
                        <select name="categorie" class="custom-select" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">Rare</option>
                            <option value="2">Haut de gamme</option>
                            <option value="3">réguliers</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Stock :</label>
                        <input type="int" class="form-control" name="stock" id="stock" placeholder="Saisissez le prix de l'article" required>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="Valider">Créer</button>
                    </div>

                </form>
            </div>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        </div>



        <div class="container-fluid" id="footer">
            <div class="container">
                <footer class="py-5">
                    <div class="row">
                        <div class="col-6 col-md-1 offset-md-1">
                            <h5>Navigation</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Accueil</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tout Parcourir</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Notifications</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Panier</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Votre compte</a></li>
                            </ul>
                        </div>

                        <div class="col-7 col-md-4 offset-md-2">
                            <h5>Contact et réseaux sociaux</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Mail:
                                        agorafrancia.commerce@gmail.com</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Tél: 12 34 56 78 90</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Instagram</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Twitter</a></li>
                                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Facebook</a></li>
                            </ul>
                        </div>

                        <div class="col-md-4" id="map">
                            <strong>
                                <h5>Où sommes-nous situés?</h5>
                            </strong>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1033.460180458264!2d2.288410797944649!3d48.85248423190897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sfr!4v1685393929817!5m2!1sen!2sfr" width="400" height="300" style="border:5px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>


                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                        <p>© 2022 Agora Fracia™</p>
                    </div>
                </footer>
            </div>
        </div>

    </div>

</body>

</html>
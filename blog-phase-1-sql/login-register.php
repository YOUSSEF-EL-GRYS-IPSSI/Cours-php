<?php require_once '_tools.php'; ?>
<!DOCTYPE html>
<html>
<head>


    <title>Login - Mon premier blog !</title>

    <meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="../css/main.css">

</head>

<body class="article-body">
<div class="container-fluid">

    <?php require 'partials/header.php'; ?>

    <div class="row my-3 article-content">



        <?php require 'partials/nav.php';?>
        <main class="col-9">


            <ul class="nav nav-tabs justify-content-center nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#login" role="tab" aria-expanded="false">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#register" role="tab" aria-expanded="true">Inscription</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane container-fluid" id="login" role="tabpanel" aria-expanded="false">

                    <form action="login-register.php" method="post" class="p-4 row flex-column">

                        <h4 class="pb-4 col-sm-8 offset-sm-2">Connexion</h4>


                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="email">Email</label>
                            <input class="form-control" value="" type="email" placeholder="Email" name="email" id="email">
                        </div>

                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="password">Mot de passe</label>
                            <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password">
                        </div>

                        <div class="text-right col-sm-8 offset-sm-2">
                            <input class="btn btn-success" type="submit" name="login" value="Valider">
                        </div>

                    </form>

                </div>

                <div class="tab-pane container-fluid active" id="register" role="tabpanel" aria-expanded="true">
                    <form action="login-register.php" method="post" class="p-4 row flex-column">

                        <h4 class="pb-4 col-sm-8 offset-sm-2">Inscription</h4>


                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="firstname">Prénom <b class="text-danger">*</b></label>
                            <input class="form-control" value="" type="text" placeholder="Prénom" name="firstname" id="firstname">
                        </div>
                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="lastname">Nom de famille</label>
                            <input class="form-control" value="" type="text" placeholder="Nom de famille" name="lastname" id="lastname">
                        </div>
                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="email">Email <b class="text-danger">*</b></label>
                            <input class="form-control" value="" type="email" placeholder="Email" name="email" id="email">
                        </div>
                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="password">Mot de passe <b class="text-danger">*</b></label>
                            <input class="form-control" value="" type="password" placeholder="Mot de passe" name="password" id="password">
                        </div>
                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="password_confirm">Confirmation du mot de passe <b class="text-danger">*</b></label>
                            <input class="form-control" value="" type="password" placeholder="Confirmation du mot de passe" name="password_confirm" id="password_confirm">
                        </div>
                        <div class="form-group col-sm-8 offset-sm-2">
                            <label for="bio">Biographie</label>
                            <textarea class="form-control" name="bio" id="bio" placeholder="Ta vie Ton oeuvre..."></textarea>
                        </div>

                        <div class="text-right col-sm-8 offset-sm-2">
                            <p class="text-danger">* champs requis</p>
                            <input class="btn btn-success" type="submit" name="register" value="Valider">
                        </div>

                    </form>

                </div>
            </div>
        </main>

    </div>

    <?php require 'partials/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.js"></script>

    <script src="js/main.js"></script>

</div>


</body>
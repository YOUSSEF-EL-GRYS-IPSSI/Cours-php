<?php
require('partials/_toolsConnexion.php');
if (isset($_GET['disconnect'])){
    unset($_SESSION['user']);
}

if (isset($_POST['connexion'])) {
    $queryUser = $db->prepare('SELECT * FROM chat_user WHERE email = ? AND password = ?');
    $queryUser->execute(array($_POST['email'], md5($_POST['password'])));

    $userExist = $queryUser->rowCount();

    if ($userExist == 1) {
        $resultUser = $queryUser->fetch();
        $_SESSION['user'] = $resultUser;
        header('location: index.html');

        $checkConnexion = $db->prepare('SELECT name, firstname, pseudo, email, id, color FROM chat_user WHERE password = ? AND  email = ? AND pseudo = ?');
        $checkConnexion->execute(
            array(
                md5($password),
                $email,
            ));

        $userConnected = $checkConnexion->fetch();





        exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

} else {
    $email = NULL;
    $password = NULL;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php  require ('partials/header.php'); ?>
</head>
<body>
<section id="sectionForm">
    <form id="connexionForm" method="post">
        <h1>Connectez-vous</h1>
        <input placeholder="Email" id="email" name="email" type="email" value="">
        <?php if(isset($_POST['email']) && empty($_POST['email'])): ?>
            <p>l'email est obligatoire</p>
        <?php endif; ?>
        <input placeholder="Mot de passe" id="password" name="password" type="password" value="">
        <?php if(isset($_POST['password']) && empty($_POST['password'])): ?>
            <p>le mot de passe est obligatoire</p>
        <?php endif; ?>
        <span id="alert"></span>
        <p style="color: white;">Vous n'avez pas de compte ? <a href="register.php" style="color: purple;"> Inscrivez-vous !</a></p>
        <div>
            <button name="connexion" type="submit" id="connexion">Connexion</button>
        </div>
    </form>
</section>
</body>
</html>

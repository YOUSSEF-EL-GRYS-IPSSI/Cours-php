<?php
//connexion à la base de données
try{
$db = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
die( 'Erreur : ' . $exception->getMessage() );
}
?>
<?php
if (isset($_POST['connection'])){

$query_user = $db->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
$query_user->execute(array($_POST['email'], $_POST['password']));
$result_user = $query_user->fetch();
}
?>


<!DOCTYPE html>

<html>

<body>

    <form action="form.php" method="POST">
  <fieldset>

    <legend>formulaire</legend>
    votre mail:<br>

    <input type="email" id="email" name="email" value="" placeholder="email">
    <?php if (isset($_POST['email']) && empty($_POST['email'])) : ?>
    l'email est obligatoire
<?php endif; ?> 
    <br>

    votre mot de passe:<br>
    <input type="password" name="password" id="password" value="" placeholder="password">
    <?php if (isset($_POST['password']) && empty($_POST['password'])) : ?>
    le mot de passe est obligatoire
<?php endif; ?> 
    <br><br>
    <input type="submit" name="connect" value="ok">
  </fieldset>
</form>

<?php 

if (isset($result_user)){
    if ($result_user != false){
     echo 'Tu es connecté';
 }
 else{
    echo 'Mauvais identifiants';
 }
 }
?>

</body>
</html>

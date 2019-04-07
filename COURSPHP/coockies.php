<?php

session_start();


if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])){

    $pseudo = $_POST['pseudo'];
    $_SESSION['pseudo'] = $pseudo;

   // setcookie('pseudo', $pseudo, time()+365*24* 3600, null , null, false, true);

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Entré votre votre pseudo</h1>

<form method="post" action="coockies.php">

    <table>
        <tr>
            <td>Pseudo</td>
            <td><input type="text" name="pseudo"></td>
        </tr>

    </table>
    <button type="submit">Se connecté</button>
</form>
<?php
// si sa existe et si sa remplis
if (!empty($_SESSION['pseudo'])){
    echo'<h2>Bienvenue '.htmlspecialchars($_SESSION['pseudo']).'</h2>';
}
?>


</body>
</html>
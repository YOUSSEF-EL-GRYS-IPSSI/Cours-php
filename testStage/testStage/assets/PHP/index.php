<?php
require('tools.php');


$data = file_get_contents('php://input');
$json = json_decode($data);

$email = $json->{'email'};
$password = $json->{'password'};
$pseudo = $json->{'pseudo'};


if (!empty($data)) {
    $res = new stdClass();

    if (!empty($email) && !empty($password) && !empty($pseudo)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL) ) {


            $checkConnexion = $db->prepare('SELECT name, firstname, pseudo, email, id, color FROM chat_user WHERE password = ? AND  email = ? AND pseudo = ?');
            $checkConnexion->execute(
                array(
                    md5($password),
                    $email,
                    $pseudo
                ));
            $userConnected = $checkConnexion->fetch();



            if (!empty($userConnected)) {

                $res->userConnect = "userConnect";


                $_SESSION = [
                        'first_name' => $userConnected['firstname'],
                        'name' => $userConnected['name'],
                        'pseudo' => $userConnected['pseudo'],
                        'email' => $userConnected['email'],
                        'user_id' => $userConnected['id'],
                        'color' => $userConnected['color']
                    ];
                
            } else {
                $res->msg = "Aucun compte n'est assigné a ces identifiants";
            }
        }else{
            $res->msg = "Adresse mail non valide";
        }
    }else{
        $res->msg = "Veuillez remplir tous les champs";
    }
}
else {
        $res->msg = "Problème lors de l'enregistrement";
    }

    echo json_encode($res);

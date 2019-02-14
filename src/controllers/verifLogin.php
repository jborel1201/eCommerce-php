<?php
include_once CONNECT_PATH . 'Connexion.php';
include_once DAO_PATH . 'UtilisateursDao.php';
include_once ENTITIES_PATH.'Utilisateurs.php';

$lcnx = Connexion::getConnection();


session_start();
//Détermine si le formulaire a été posté
$isPosted = filter_has_var(INPUT_POST, "submit");
$errors = "";

/*///////////////////////////////////////////////////
                         * Traitement du formulaire
 *//////////////////////////////////////////////////

if ($isPosted) {
    // Récupération des données
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);

    //  //  //  //  //  //
    //Validation
    //  //  //  //  //  //
    if (empty($login)) {
        $errors .= "L'identifiant ne peut être vide <br>";
        echo $viewContent = getRenderedView("login", ["errors" => $errors, "errorsNew" => ""]);
    }

    if (empty($password)) {
        $errors .= "Le mot de passe ne peut être vide";
        echo $viewContent = getRenderedView("login", ["errors" => $errors, "errorsNew" => ""]);
    }

    //  //  //  //  //  //
    //Exploitation des données
    //  //  //  //  //  //

    if (empty($errors)) {

        $utilisateur = UtilisateursDao::utilisateursSelectOne($lcnx, array($login));

        if ($password == $utilisateur->getMdp()) {

            session_regenerate_id(true);

            $_SESSION["user"] = serialize($utilisateur);
            echo $viewContent = getRenderedView("home", []);

        } else {
            $errors = "Vos infos de connexion sont incorrectes";
            echo $viewContent = getRenderedView("login", ["errors" => $errors, "errorsNew" => "", "login" => $login]);
        }


    }

}

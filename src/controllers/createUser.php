<?php

include_once CONNECT_PATH.'Connexion.php' ;
include_once DAO_PATH.'UtilisateursDao.php';

$lcnx = Connexion::getConnection();


$isPosted = filter_has_var(INPUT_POST, "submit");
$errors = "";
//  //  //  //  //  //
//Traitement du formulaire
//  // //  //  //  //
if ($isPosted) {
    // Récupération des données
    $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_STRING);
    $verifPassword = filter_input(INPUT_POST, "verifPwd",FILTER_SANITIZE_STRING);

    //  //  //  //  //  //
    //Validation
    //  //  //  //  //  //
    if(empty($login)){
        $errors .= "L'identifiant ne peut être vide";
        echo $viewContent = getRenderedView("login",["errors" => "","errorsNew" => $errors ]);
    }

    if(empty($password)){
        $errors .= "Le mot de passe ne peut être vide";
        echo $viewContent = getRenderedView("login",["errors" => "","errorsNew" => $errors ]);
    }
    //  //  //  //  //  //
    //Exploitation des données
    //  //  //  //  //  //
    if(empty($errors)){

        if($password!=$verifPassword){
            $errors .= "Erreur de confirmation du mot de passe";
            echo $viewContent = getRenderedView("login",["errors" => "","errorsNew" => $errors ]);
        }

        $utilisateur = UtilisateursDao::utilisateursSelectOne($lcnx,array($login));

        if($utilisateur->getPseudo() != null){
            $errors .= "non utilisateur déja existant";
            echo $viewContent = getRenderedView("login", ["errors" => "","errorsNew" => $errors ]);
        }
        else{
            $utilisateur = new Utilisateurs();
            $utilisateur
                ->setPseudo($login)
                ->setMdp($password);
            UtilisateursDao::utilisateursInsert($lcnx,$utilisateur);
            echo $viewContent = getRenderedView("login",["errors" => "" ,"errorsNew" => "", "login" => $login]);
        }

    }
}
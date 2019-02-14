<?php

require_once ENTITIES_PATH.'Utilisateurs.php';
require_once DAO_PATH.'ClientsDao.php';
require_once CONNECT_PATH.'Connexion.php';

session_start();
$lcnx = Connexion::getConnection();


if(!isset($_SESSION['user'])){
    echo $viewContent = getRenderedView("login",["errors" => "Vous devez être connecter pour valider votre commande " ,"errorsNew" => ""]);
}else{
    $userClients = ClientsDao::clientsSelectByIdUtilisateur($lcnx, unserialize($_SESSION['user']));

    if(!$userClients){

        echo $viewContent = getRenderedView("createClient",['errors'=>""]);
    }else{


        echo $viewContent = getRenderedView("validerCommande",['listeClients'=>serialize($userClients)]);
    }
}
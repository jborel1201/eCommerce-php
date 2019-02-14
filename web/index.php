<?php

define("ROOT_PATH", dirname(__DIR__));
define("SRC_PATH", ROOT_PATH. "/src/");
define("WEB_PATH", __DIR__);
define("CTRL_PATH",SRC_PATH. "controllers/");
define("VIEW_PATH",SRC_PATH. "views/");
define("MODEL_PATH", SRC_PATH. "models/");
define("CONNECT_PATH",MODEL_PATH. "connexion/");
define("DAO_PATH", MODEL_PATH."daos/");
define("ENTITIES_PATH",MODEL_PATH."entities/");
define("IMG_PRODUCTS_PATH","img/produits/");




//Inclusion de la bibliothèque pour le routage

require ROOT_PATH . "/libs/mvc.php";
require_once ENTITIES_PATH.'Utilisateurs.php';

//Définition du fichier dans le controller
$controllerFile = getController();
require $controllerFile;





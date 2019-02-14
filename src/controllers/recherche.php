<?php

include_once DAO_PATH.'ProduitsDao.php';
include_once CONNECT_PATH.'Connexion.php';


//Connection
$lcnx = Connexion::getConnection();

$recherche = $_POST['recherche'];

$listeProduits = ProduitsDao::produitsSelectFewResearch($lcnx,$recherche);

echo $viewContent = getRenderedView("achat",["produits"=>$listeProduits]);

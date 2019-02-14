<?php
include_once CONNECT_PATH.'Connexion.php' ;
include_once DAO_PATH.'CategoriesDao.php';
include_once DAO_PATH.'ProduitsDao.php';

$lcnx = Connexion::getConnection();

$selectCat = filter_input(
        INPUT_GET, "cat",
        FILTER_SANITIZE_STRING
    );

$categorie = CategoriesDao::categoriesSelectOne($lcnx,array($selectCat));

$listeProduits = ProduitsDao::produitsSelectFewByCategorie($lcnx,array($categorie->getIdCategorie()));


echo $viewContent = getRenderedView("achat",["produits"=>$listeProduits]);
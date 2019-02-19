<?php

include_once CONNECT_PATH.'Connexion.php' ;
include_once DAO_PATH.'ProduitsDao.php';
include_once ENTITIES_PATH.'ProduitsBD.php';

$lcnx= Connexion::getConnection();


function setDataToProduct($arg,$produit){

    $produit
        ->setDesignationProduit($arg['designation'])
        ->setPrixProduit($arg['prix'])
        ->setPhotoProduit($arg['photo'])
        ->setIdCategorie($arg['categorie']);


}


function updateProduct($arg,$lcnx){


    $produit = ProduitsDao::produitsSelectOneById($lcnx,array($arg['id']));

    setDataToProduct($arg,$produit);


    ProduitsDao::produitsUpdate($lcnx,$produit);


}


function insertProduct($arg,$lcnx){

    $produit = new ProduitsBD();
    setDataToProduct($arg,$produit);
    $produit->setQuantite(0);

    var_dump($produit);
    ProduitsDao::produitsInsert($lcnx,$produit);

}

$id = filter_input(INPUT_POST,'update', FILTER_SANITIZE_STRING);


$arg = [
    'designation'=>filter_input(INPUT_POST,'designation',FILTER_SANITIZE_STRING),
    'prix'=>filter_input(INPUT_POST,'prix', FILTER_SANITIZE_STRING),
    'photo'=>filter_input(INPUT_POST,'photo', FILTER_SANITIZE_STRING),
    'categorie'=> filter_input(INPUT_POST,'categorie', FILTER_SANITIZE_STRING),
    'id'=>$id
];


// Insert ou update
$id ? updateProduct($arg,$lcnx) : insertProduct($arg,$lcnx);

include_once CTRL_PATH.'gestionProduit.php';
<?php

include_once CONNECT_PATH.'Connexion.php' ;
include_once DAO_PATH.'ProduitsDao.php';
include_once ENTITIES_PATH.'ProduitsBD.php';

$lcnx= Connexion::getConnection();




function setDataToObject($arg,$produit){

    $produit
        ->setDesignationProduit($arg['designation'])
        ->setPrixProduit($arg['prix'])
        ->setPhotoProduit($arg['photo'])
        ->setIdCategorie($arg['categorie']);


}


function updateProduct($arg,$lcnx){


    $produit = ProduitsDao::produitsSelectOneById($lcnx,array($arg['id']));

    setDataToObject($arg,$produit);


    ProduitsDao::produitsUpdate($lcnx,$produit);


}


function insertProduct($arg,$lcnx){

    $produit = new ProduitsBD();
    setDataToObject($arg,$produit);
    $produit->setQuantite(0);

    ProduitsDao::produitsInsert($lcnx,$produit);

}

function deleteProduct($id,$lcnx){


    $produit = ProduitsDao::produitsSelectOneById($lcnx,array($id));
    ProduitsDao::produitsDelete($lcnx,$produit);


}

$id = filter_input(INPUT_POST,'update', FILTER_SANITIZE_STRING);
$delete = filter_input(INPUT_POST,'delete', FILTER_SANITIZE_STRING);

$arg = [
    'designation'=>filter_input(INPUT_POST,'designation',FILTER_SANITIZE_STRING),
    'prix'=>filter_input(INPUT_POST,'prix', FILTER_SANITIZE_STRING),
    'photo'=>filter_input(INPUT_POST,'photo', FILTER_SANITIZE_STRING),
    'categorie'=> filter_input(INPUT_POST,'categorie', FILTER_SANITIZE_STRING),
    'id'=>$id
];



// Mise a jour de la bd
$delete ? deleteProduct($delete,$lcnx) : ($id ? updateProduct($arg,$lcnx) : insertProduct($arg,$lcnx));

include_once CTRL_PATH.'gestionProduit.php';
<?php

include_once CONNECT_PATH.'Connexion.php';
include_once DAO_PATH.'ProduitsDao.php';

$lcnx = Connexion::getConnection();

$nomProduit = $_GET['produit'];
$quantite = $_GET['quantite'];

$produit = ProduitsDao::produitsSelectOneByDesignation($lcnx,array($nomProduit));

$produit->setQuantite($produit->getQuantite()+$quantite);

ProduitsDao::produitsUpdate($lcnx,$produit);

include_once CTRL_PATH.'appro.php';
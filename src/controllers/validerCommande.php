<?php

require_once ENTITIES_PATH . 'Clients.php';
require_once ENTITIES_PATH. 'ProduitsPanier.php';
require_once ENTITIES_PATH. 'ProduitsBD.php';
require_once DAO_PATH . 'CommandesDao.php';
require_once DAO_PATH . 'LignesDeCommandesDao.php';
require_once DAO_PATH.'ProduitsDao.php';
require_once CONNECT_PATH . 'Connexion.php';

session_start();

$lcnx = Connexion::getConnection();

$client = $_POST['client'];
$date = new DateTime();


/*
 * Insert de la commande
 */
$commande = new Commandes();
$commande
    ->setDateCommande($date->format('Y-m-d H:i:s'))
    ->setIdClient($client);


$idCommande = CommandesDao::commandesInsert($lcnx, $commande);

foreach ($_SESSION['panier'] as $key => $val) {
    $produitPanier = unserialize($val);
    $produitBd = ProduitsDao::produitsSelectOneByDesignation($lcnx, array($produitPanier->getDesignationProduit()));

    $quantitePanier = $produitPanier->getQuantite();
    $quantiteBd = $produitBd->getQuantite();


    if($quantiteBd-$quantitePanier <= 0){
        // update de la quantité
        $produitBd->setQuantite(0);

        //création de la ligne de commande
        $ligneDeCommande = new LignesDeCommandes();
        $ligneDeCommande
            ->setIdCommande($idCommande)
            ->setIdProduit($produitBd->getIdProduit())
            ->setQuantiteCommandee($quantitePanier-$quantiteBd);



        /*
         * TODO recuperer et afficher les produits non commande (rupture stock)
         */
    }else{

        // update de la quantité
        $produitBd->setQuantite($quantiteBd-$quantitePanier);

        //création de la ligne de commande
        $ligneDeCommande = new LignesDeCommandes();
        $ligneDeCommande
            ->setIdCommande($idCommande)
            ->setIdProduit($produitBd->getIdProduit())
            ->setQuantiteCommandee($quantitePanier);



    }

    // mise à jour de la bd
    ProduitsDao::produitsUpdate($lcnx,$produitBd);
    LignesDeCommandesDao::lignesDeCommandesInsert($lcnx,$ligneDeCommande);

}


/*
 * Verification des produits en stock, ajout ligne de commande et destockage.
 */









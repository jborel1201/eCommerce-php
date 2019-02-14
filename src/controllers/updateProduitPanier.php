<?php

include_once ENTITIES_PATH . 'ProduitsPanier.php';

session_start();
$produit = $_GET['produit'];
$quantite = $_GET['quantite'];

if ($quantite <= 0) {
    unset($_SESSION["panier"][$produit]);
} else {

    //Recupération de l'objet et désérialisation
    $produitPanier = unserialize($_SESSION['panier'][$produit]);
    // modification de la quantité
    $produitPanier->setQuantite($quantite);
    //update de du panier
    $_SESSION['panier'][$produit] = serialize($produitPanier);
}


echo $viewContent = getRenderedView("voirPanier", ['panierSerialise' => $_SESSION['panier']]);

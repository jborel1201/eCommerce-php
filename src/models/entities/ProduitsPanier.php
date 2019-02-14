<?php
include_once ENTITIES_PATH.'abstractProduits.php';

class ProduitsPanier extends abstractProduits
{


    public function totalPrice(){

        return $this->quantite*$this->prixProduit;
    }

}
<?php

include_once ENTITIES_PATH.'abstractProduits.php';

class ProduitsBD extends abstractProduits
{


    private $idCategorie;
    private $photoProduit;


    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * @param $idCategorie
     * @return $this
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhotoProduit()
    {
        return $this->photoProduit;
    }

    /**
     * @param $photoProduit
     * @return $this
     */
    public function setPhotoProduit($photoProduit)
    {
        $this->photoProduit = $photoProduit;
        return $this;
    }



}
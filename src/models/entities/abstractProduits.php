<?php
/**
 * Created by PhpStorm.
 * User: JEROME
 * Date: 03/02/2019
 * Time: 20:46
 */

abstract class abstractProduits
{

    protected $idProduit;
    protected $designationProduit;
    protected $prixProduit;
    protected $quantite;


    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param $idProduit
     * @return $this
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDesignationProduit()
    {
        return $this->designationProduit;
    }

    /**
     * @param $designationProduit
     * @return $this
     */
    public function setDesignationProduit($designationProduit)
    {
        $this->designationProduit = $designationProduit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * @param $prixProduit
     * @return $this
     */
    public function setPrixProduit($prixProduit)
    {
        $this->prixProduit = $prixProduit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param $quantite
     * @return $this
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/01/2019
 * Time: 14:42
 */


class LignesDeCommandes
{

    private $idCommande;
    private $idProduit;
    private $quantiteCommandee;

    /**
     * LignesDeCommandesDao constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param mixed $idCommande
     * @return LignesDeCommandes
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     * @return LignesDeCommandes
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantiteCommandee()
    {
        return $this->quantiteCommandee;
    }

    /**
     * @param mixed $quantiteCommandee
     * @return LignesDeCommandes
     */
    public function setQuantiteCommandee($quantiteCommandee)
    {
        $this->quantiteCommandee = $quantiteCommandee;
        return $this;
    }


}
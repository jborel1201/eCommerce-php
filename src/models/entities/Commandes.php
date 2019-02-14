<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/01/2019
 * Time: 14:39
 */

class Commandes
{
    private $idCommande;
    private $dateCommande;
    private $idClient;

    /**
     * Commandes constructor.
     * @param $idCommande
     * @param $dateCommande
     * @param $idClient
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
     * @return Commandes
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCommande()
    {
        return $this->dateCommande;
    }

    /**
     * @param mixed $dateCommande
     * @return Commandes
     */
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande = $dateCommande;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     * @return Commandes
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
        return $this;
    }



}
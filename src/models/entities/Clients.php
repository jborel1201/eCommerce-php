<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/01/2019
 * Time: 11:50
 */

class Clients
{
    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $adresseClient;
    private $dateNaissanceClient;
    private $idUtilisateur;

    /**
     * Clients constructor.
     */
    public function __construct(){

    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param $idClient
     * @return $this
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * @param $nomClient
     * @return $this
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * @param $prenomClient
     * @return $this
     */
    public function setPrenomClient($prenomClient)
    {
        $this->prenomClient = $prenomClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresseClient()
    {
        return $this->adresseClient;
    }

    /**
     * @param $adresseClient
     * @return $this
     */
    public function setAdresseClient($adresseClient)
    {
        $this->adresseClient = $adresseClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateNaissanceClient()
    {
        return $this->dateNaissanceClient;
    }

    /**
     * @param $dateNaissanceClient
     * @return $this
     */
    public function setDateNaissanceClient($dateNaissanceClient)
    {
        $this->dateNaissanceClient = $dateNaissanceClient;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param $idUtilisateur
     * @return $this
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }


}//class


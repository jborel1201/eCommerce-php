<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/01/2019
 * Time: 14:15
 */

class Villes
{

    private $idVille;
    private $cp;
    private $nomVille;
    private $idPays;


    /**
     * Villes constructor.
     * @param $idVille
     * @param $cp
     * @param $nomVille
     * @param $idPays
     */
    public function __construct($idVille, $cp, $nomVille, $idPays)
    {
        $this->idVille = $idVille;
        $this->cp = $cp;
        $this->nomVille = $nomVille;
        $this->idPays = $idPays;
    }//constructeur

    /**
     * @return mixed
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * @param mixed $idVille
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getNomVille()
    {
        return $this->nomVille;
    }

    /**
     * @param mixed $nomVille
     */
    public function setNomVille($nomVille)
    {
        $this->nomVille = $nomVille;
    }

    /**
     * @return mixed
     */
    public function getIdPays()
    {
        return $this->idPays;
    }

    /**
     * @param mixed $idPays
     */
    public function setIdPays($idPays)
    {
        $this->idPays = $idPays;
    }


}
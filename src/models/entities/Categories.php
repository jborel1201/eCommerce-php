<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 21/01/2019
 * Time: 12:17
 */

class Categories
{

    private $idCategorie;
    private $libelleCategorie;



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
    public function getLibelleCategorie()
    {
        return $this->libelleCategorie;
    }

    /**
     * @param $libelleCategorie
     * @return $this
     */
    public function setLibelleCategorie($libelleCategorie)
    {
        $this->libelleCategorie = $libelleCategorie;
        return $this;
    }


}//class
<?php

include_once DAO_PATH.'abstractDAO.php';
include_once ENTITIES_PATH.'Categories.php';


class CategoriesDao extends abstractDAO
{

    public static function categoriesSelectAll($cnx)
    {
        $sql = "SELECT * FROM categories";
        $cursor =  self::selectAll($cnx, $sql);
        $listeCategorie = array();
        while($donnee = $cursor->fetch()){
            $categorie = new Categories();
            $categorie
                ->setIdCategorie($donnee['id_categorie'])
                ->setLibelleCategorie($donnee['libelle_categorie']);
        }

        return $listeCategorie;
    }

    public static function categoriesSelectOne($cnx, $param)
    {
        $sql = "SELECT * FROM categories WHERE libelle_categorie = ?";
        $result = self::selectWithParameter($cnx, $sql, $param);

        $categorie = new Categories();

        $categorie
            ->setIdCategorie($result['id_categorie'])
            ->setLibelleCategorie($result['libelle_categorie']);


        return $categorie;

    }

}
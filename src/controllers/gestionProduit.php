<?php
include_once CONNECT_PATH.'Connexion.php' ;
include_once DAO_PATH.'CategoriesDao.php';
include_once DAO_PATH.'ProduitsDao.php';

$lcnx = Connexion::getConnection();


/*
 * Création d'un map pour gestion des catégories lors des ajouts de produits
 */
function generateMapCatégorie($categories)
{
    foreach ($categories as $categorie) {
        $mapCategories[$categorie->getLibelleCategorie()] = $categorie->getIdCategorie();
    }

    return $mapCategories;
}

$listeCategories = CategoriesDao::categoriesSelectAll($lcnx);

$listeProduits = ProduitsDao::produitsSelectAll($lcnx);

echo $viewContent = getRenderedView("gestionProduit",[
        "produits"=>$listeProduits,
        "mapCategorie"=>generateMapCatégorie($listeCategories),
        "categories" => $listeCategories]);


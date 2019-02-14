<?php
include_once DAO_PATH.'abstractDAO.php';
include_once ENTITIES_PATH . 'ProduitsBD.php';

class ProduitsDao extends abstractDAO
{

    public static function produitsSelectAll($cnx)
    {
        $sql = "SELECT * FROM produits";
        $cursor = self::selectAll($cnx, $sql);
        $listProsuits = array();
        while($donnee = $cursor->fetch()){
            $produit= new ProduitsBD();
            $produit
                ->setIdProduit($donnee['id_produit'])
                ->setDesignationProduit($donnee['designation_produit'])
                ->setPrixProduit($donnee['prix_produit'])
                ->setPhotoProduit($donnee['photo_produit'])
                ->setQuantite($donnee['quantite'])
                ->setIdCategorie($donnee['id_categorie']);
            array_push($listProsuits,$produit);
        }
        return $listProsuits;
    }

    public static function produitsSelectFewByCategorie($cnx,$param)
    {
        $sql = "SELECT * FROM produits WHERE id_categorie = ?";
        $cursor = self::selectWithParameterList($cnx,$sql,$param);
        $listProduits = array();
        while($donnee = $cursor->fetch()){
            $produit= new ProduitsBD();
            $produit
                ->setIdProduit($donnee['id_produit'])
                ->setDesignationProduit($donnee['designation_produit'])
                ->setPrixProduit($donnee['prix_produit'])
                ->setPhotoProduit($donnee['photo_produit'])
                ->setQuantite($donnee['quantite'])
                ->setIdCategorie($donnee['id_categorie']);
            array_push($listProduits,$produit);
        }
        return $listProduits;
    }
    public static function produitsSelectFewResearch($cnx,$param)
    {
        $sql = "SELECT * FROM produits WHERE designation_produit LIKE '".$param."%'";
        $resultSet = $cnx->query($sql);
        $listProduits = array();
        while($donnee = $resultSet->fetch()){
            $produit= new ProduitsBD();
            $produit
                ->setIdProduit($donnee['id_produit'])
                ->setDesignationProduit($donnee['designation_produit'])
                ->setPrixProduit($donnee['prix_produit'])
                ->setPhotoProduit($donnee['photo_produit'])
                ->setQuantite($donnee['quantite'])
                ->setIdCategorie($donnee['id_categorie']);
            array_push($listProduits,$produit);
        }
        return $listProduits;
    }
    public static function produitsSelectOneByDesignation($cnx, $param)
    {
        $sql = "SELECT * FROM produits WHERE designation_produit = ?";
        $result = self::selectWithParameter($cnx, $sql, $param);

        $produit= new ProduitsBD();
        $produit
            ->setIdProduit($result['id_produit'])
            ->setDesignationProduit($result['designation_produit'])
            ->setPrixProduit($result['prix_produit'])
            ->setPhotoProduit($result['photo_produit'])
            ->setQuantite($result['quantite'])
            ->setIdCategorie($result['id_categorie']);


        return $produit;

    }



    public static  function produitsInsert($cnx,$produit){
        $param = array(
            $produit->getDesignationProduit(),
            $produit->getPrixProduit(),
            $produit->getPhotoProduit(),
            $produit->getQuantite(),
            $produit->getIdCategorie(),
        );
        $sql = "INSERT INTO produits (designation_produits,prix_produit,photo_produit,quantite,id_categorie) VALUES (?,?,?,?,?)";
        return self::CUD($cnx,$sql,$param);
    }

    public static function produitsDelete($cnx,$produit){
        $param = array(
            $produit->getIdProduit()
        );
        $sql = "DELETE FROM produits WHERE id_produit = ?";
        return self::CUD($cnx,$sql,$param);
    }

    public static function produitsUpdate($cnx,$produit){
        $param = array(
            $produit->getDesignationProduit(),
            $produit->getPrixProduit(),
            $produit->getPhotoProduit(),
            $produit->getQuantite(),
            $produit->getIdCategorie(),
            $produit->getIdProduit()
        );
        $sql = "UPDATE produits SET designation_produit = ?, prix_produit = ?,photo_produit = ?, quantite = ?, id_categorie = ? WHERE id_produit = ?";
        return self::CUD($cnx,$sql,$param);
    }

}
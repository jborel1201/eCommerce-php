<?php
require_once DAO_PATH.'abstractDAO.php';
include_once ENTITIES_PATH.'LignesDeCommandes.php';

class LignesDeCommandesDao extends abstractDAO
{

    public static function lignesDeCommandesSelectAll($cnx)
    {
        $sql = "SELECT * FROM lignes_de_commandes";
        return self::selectAll($cnx, $sql);
    }


    public static function lignesDeCommandesInsert($cnx, $ligneCommande)
    {
        $param = array(
            $ligneCommande->getIdCommande(),
            $ligneCommande->getIdProduit(),
            $ligneCommande->getQuantiteCommandee()
        );


        $sql = "INSERT INTO lignes_de_commandes (id_commande, id_produit, quantite_commandee) VALUES (?,?,?)";
        return self::CUD($cnx, $sql, $param);
    }


}
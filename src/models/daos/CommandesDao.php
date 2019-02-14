<?php
include 'abstractDAO.php';
include_once ENTITIES_PATH . 'Commandes.php';

class CommandesDao extends abstractDAO
{

    public static function commandesSelectAll($cnx)
    {
        $sql = "SELECT * FROM commandes";
        return self::selectAll($cnx, $sql);
    }

    public static function commandesInsert($cnx, $commande)
    {
        $param = array(
            $commande->getDateCommande(),
            $commande->getIdClient()
        );

        $sql = "INSERT INTO commandes (date_commande, id_client) VALUES (?,?)";
        return self::CUD($cnx, $sql, $param);

    }

}
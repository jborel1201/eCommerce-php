<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 25/01/2019
 * Time: 10:14
 */

include '../entities/Villes.php';
include 'abstractDAO.php';

class villesDao extends abstractDAO
{

    public static function villesSelectAll($cnx)
    {
        $sql = "SELECT * FROM villes";
        return self::selectAll($cnx, $sql);
    }

    public static function villesInsert($cnx, $ville)
    {
        $param = array(
            $ville->getCp(),
            $ville->getNomVille()
        );

        $sql = "INSERT INTO villes (cp,nom_ville) VALUES (?,?)";
        return self::CUD($cnx, $sql, $param);
    }

    public static function villesDelete($cnx, $ville)
    {
        $param = array(
            $ville->getIdVille()
        );

        $sql = "DELETE FROM villes WHERE id_ville = ?";
        return self::CUD($cnx, $sql, $param);
    }

    public static function villesUpdate($cnx, $ville)
    {
        $param = array(
            $ville->getCp(),
            $ville->getNomVille(),
            $ville->getIdVille()
        );

        $sql = "UPDATE villes SET cp = ?, nom_ville = ? WHERE id_ville = ?";
        return self::CUD($cnx, $sql, $param);
    }
}



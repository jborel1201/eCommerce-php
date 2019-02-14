<?php
include_once DAO_PATH.'abstractDAO.php';
include_once ENTITIES_PATH.'Utilisateurs.php';

class UtilisateursDao extends abstractDAO
{

    public static function utilisateursSelectAll($cnx)
    {
        $sql = "SELECT * FROM utilisateurs";
        $cursor = self::selectAll($cnx, $sql);
        $listUtilisateurs = array();
        while ($donnee = $cursor->fetch()) {

            $utilisateur = new Utilisateurs();

            $utilisateur
                ->setIdUtilisateur($donnee['id_utilisateur'])
                ->setPseudo($donnee['pseudo'])
                ->setMdp($donnee['mdp']);

            array_push($listUtilisateurs, $utilisateur);
        }
        return $listUtilisateurs;
    }

    public static function utilisateursSelectOne($cnx, $param)
    {
        $sql = "SELECT * FROM utilisateurs WHERE pseudo = ?";
        $result = self::selectWithParameter($cnx, $sql, $param);

        $utilisateur = new Utilisateurs();
        $utilisateur
            ->setIdUtilisateur($result['id_utilisateur'])
            ->setPseudo($result['pseudo'])
            ->setMdp($result['mdp']);

        return $utilisateur;

    }

    public static function utilisateursInsert($cnx, $utilisateur)
    {
        $param = array(
            $utilisateur->getPseudo(),
            $utilisateur->getMdp()
        );

        $sql = "INSERT INTO utilisateurs (pseudo,mdp) VALUES (?,?)";
        return self::CUD($cnx, $sql, $param);
    }

    public static function utilisateursDelete($cnx, $utilisateur)
    {
        $param = array(
            $utilisateur->getId()
        );

        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = ?";
        return self::CUD($cnx, $sql, $param);
    }

    public static function utilisateursUpdate($cnx, $utilisateur)
    {
        $param = array(
            $utilisateur->getPseudo(),
            $utilisateur->getMdp(),
            $utilisateur->getId()
        );

        $sql = "UPDATE utilisateurs SET pseudo = ?, mdp = ? WHERE id_utilisateur = ? ";
        return self::CUD($cnx, $sql, $param);
    }


}
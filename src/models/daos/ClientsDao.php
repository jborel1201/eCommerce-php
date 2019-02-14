<?php

include_once DAO_PATH . 'abstractDAO.php';
include_once ENTITIES_PATH . 'Clients.php';

class ClientsDao extends abstractDAO
{
    public static function clientsSelectAll($cnx)
    {
        $sql = "SELECT * FROM clients";
        $cursor = self::selectAll($cnx, $sql);
        $listeClients = array();
        while ($donnee = $cursor->fetch()) {
            $client = new Client();
            $client
                ->setIdClient($donnee['id_client'])
                ->setNomClient($donnee['nom_client'])
                ->setPrenomClient($donnee['prenom_client'])
                ->setAdresseClient($donnee['adresse_client'])
                ->setDateNaissanceClient($donnee['date_naissance_client'])
                ->setIdUtilisateur($donnee['id_utilisateur']);

            array_push($listeClients,$client);
        }

        return $listeClients;
    }

    public static function clientsSelectByIdUtilisateur($cnx, $utilisateur)
    {
        $param = array(
            $utilisateur->getIdUtilisateur()
        );

        $sql = "SELECT * FROM clients WHERE id_utilisateur = ?";
        $cursor = self::selectWithParameterList($cnx, $sql, $param);

        $listeClients = array();
        while ($donnee = $cursor->fetch()) {

            $client = new Clients();
            $client
                ->setIdClient($donnee['id_client'])
                ->setNomClient($donnee['nom_client'])
                ->setPrenomClient($donnee['prenom_client'])
                ->setAdresseClient($donnee['adresse_client'])
                ->setDateNaissanceClient($donnee['date_naissance_client'])
                ->setIdUtilisateur($donnee['id_utilisateur']);

            array_push($listeClients,$client);
        }

        return $listeClients;

    }

    public static function clientsInsert($cnx, $client)
    {
        $param = array(
            $client->getNomClient(),
            $client->getPrenomClient(),
            $client->getAdresseClient(),
            $client->getDateNaissanceClient(),
            $client->getIdUtilisateur()
        );
        $sql = "INSERT INTO clients (nom_client,prenom_client,adresse_client,date_naissance_client,id_utilisateur) VALUES (?,?,?,?,?)";
        return self::CUD($cnx, $sql, $param);
    }

    public static function clientsDelete($cnx, $client)
    {
        $param = array(
            $client->getIdClient()
        );

        $sql = "DELETE FROM clients WHERE id_client = ?";
        return self::CUD($cnx, $sql, $param);
    }

    public static function clientsUpdate($cnx, $client)
    {
        $param = array(
            $client->getNomClient(),
            $client->getPrenomClient(),
            $client->getAdresseClient(),
            $client->getDateNaissanceClient(),
            $client->getIdUtilisateur(),
            $client->getIdClient()
        );

        $sql = "UPDATE clients SET nom_client = ?, prenom_client = ?, adresse_client = ?, date_naissance_client = ?, id_utilisateur = ? WHERE id_client = ?";
        return self::CUD($cnx, $sql, $param);
    }

}
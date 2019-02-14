<?php

include_once ENTITIES_PATH.'Utilisateurs.php';
include_once ENTITIES_PATH.'Clients.php';
include_once DAO_PATH.'ClientsDao.php';

include_once CONNECT_PATH.'Connexion.php';

$lcnx = Connexion::getConnection();
session_start();

// Recupération des données
$nom = filter_input(INPUT_POST,'nom',FILTER_SANITIZE_STRING);
$prenom = filter_input(INPUT_POST,'prenom', FILTER_SANITIZE_STRING);
$adresse = filter_input(INPUT_POST,'adresse', FILTER_SANITIZE_STRING);
$dateNaissance = filter_input(INPUT_POST,'dateNaissance', FILTER_SANITIZE_STRING);
$idUtilisateur = unserialize($_SESSION['user'])->getIdUtilisateur();


$client = new Clients();
$client
    ->setNomClient($nom)
    ->setPrenomClient($prenom)
    ->setAdresseClient($adresse)
    ->setDateNaissanceClient(date('Y-m-d',strtotime($dateNaissance)))
    ->setIdUtilisateur($idUtilisateur);

ClientsDao::clientsInsert($lcnx,$client);

echo $viewContent = getRenderedView("validerCommande",['listeClients'=>serialize(array($client))]);






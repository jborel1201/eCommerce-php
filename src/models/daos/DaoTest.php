<?php

include 'ProduitsDao.php';
include '../connexion/Connexion.php';

//Connection
Connexion::getConnection();
$lcnx = Connexion::$cnx;

//Utilisateurs Test/Parametres recherche
//$utilisateur = new Utilisateurs('5','test2','test2');
$param= array('Rui');

$produits= ProduitsDao::produitsSelectFewResearch($lcnx,$param);
/*
 * INSERT
 */

//UtilisateursDao::utilisateursInsert($lcnx,$utilisateur);

/*
 * DELETE
 */

//UtilisateursDao::utilisateursDelete($lcnx,$param);

/*
 * UPDATE
 */

//UtilisateursDao::utilisateursUpdate($lcnx,$param);

/*
 * SELECT
 */

//$utilisateurs = UtilisateursDao::utilisateursSelectAll($lcnx);
//$utilisateur = UtilisateursDao::utilisateursSelectOne($lcnx,$param);

//Affichage des resultats des tests
//var_dump($utilisateurs);
var_dump($produits);


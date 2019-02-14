<?php

session_start();

include_once CONNECT_PATH.'Connexion.php';
include_once DAO_PATH.'ProduitsDao.php';

$lcnx = Connexion::getConnection();

$listeProduits = ProduitsDao::produitsSelectAll($lcnx);


function intCompare($a,$b) {
    if($a == $b)return 0;
    if($a  > $b)return 1;
    if($a  < $b)return -1;
}

function comparer($a, $b) {

    return intCompare((int) $a->getQuantite(), (int) $b->getQuantite());
}

usort($listeProduits,'comparer');


echo $viewContent = getRenderedView("appro",["produits"=>$listeProduits]);
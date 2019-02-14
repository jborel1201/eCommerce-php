<?php
session_start();

//Vérification de l'existence de la variable de session
if($_SESSION['panier']){
    //Affectation d'un tableau vide
    $_SESSION['panier'] = [];
}


echo $viewContent = getRenderedView("home",[]);
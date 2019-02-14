<?php
session_start();

if(isset($_SESSION['panier'])){
echo $viewContent = getRenderedView("voirPanier",$_SESSION['panier']?['panierSerialise'=>serialize($_SESSION['panier'])]: []);}
else{
    echo $viewContent = getRenderedView("voirPanier",[]);
}
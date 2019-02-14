<?php

include_once ENTITIES_PATH."ProduitsPanier.php";

function affichePanier()
{
    $htmlPanier = null;
    if (isset($_SESSION['panier'])) {
        ob_start();

        foreach ($_SESSION['panier'] as $key => $value) {
            $val = unserialize($value);
            echo "
<div class='col-12'>"
                . $val->getDesignationProduit() . "<br>"
                . $val->totalPrice() . "€      
         
</div><br>";

        }

        $htmlPanier = ob_get_clean();
    }

    return $htmlPanier;
}
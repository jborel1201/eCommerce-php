<?php

if(isset($_SESSION['panier'])) {
    ob_start();




    foreach ($_SESSION['panier'] as $key => $value) {
        echo "
<div class='col-12'>"
            . $value->getDesignationProduit() . "<br>"
            . $value->totalPrice()."€      
         
</div><br>";

    }

    $html = ob_get_clean();
}
?>


<h2>Panier</h2>

<div class='row align-items-center' style='border: 1px solid dodgerblue'>
    <?= $html ?? "" ?>
</div>


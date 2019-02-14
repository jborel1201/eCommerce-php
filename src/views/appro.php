<?php

ob_start();


echo "
    <thead>
        <tr>
            <th>Produits</th>
            <th>PU</th>
            <th>Quantite en stock</th>
            <th>quantite à commander</th>    
        </tr>
    </thead> 
    <tbody>  
";
if (isset($produits)) {

    foreach ($produits as $produit) {

        echo"            
 
                <tr>
        
                    <td>" . $produit->getDesignationProduit() . "</td>
                    <td>".$produit->getPrixProduit()."</td>
                    <td>". $produit->getQuantite() . "</td>
                    <td><input type='number' min='0' value='0'></td>
        
                </tr>           
                   
        ";



    }

    echo "
        </tbody> 
       
    ";
}

$html = ob_get_clean();
?>

<script src="script/appro.js"></script>

<h2>Appro</h2>

<table class="table" id="appro">
    <?= $html ?>
</table>


<?php
include_once ENTITIES_PATH . 'ProduitsPanier.php';
ob_start();

echo "
    <thead>
        <tr>
            <th>Produits</th>
            <th>PU</th>
            <th>Quantite</th>
            <th>Prix</th>    
        </tr>
    </thead> 
    <tbody>  
";
if (isset($_SESSION['panier'])) {
    $total = 0;
    foreach ($_SESSION['panier'] as $key => $val) {
        $produit = unserialize($val);

        echo"            
 
                <tr>
        
                    <td>" . $produit->getDesignationProduit() . "</td>
                    <td>".$produit->getPrixProduit()."</td>
                    <td><input type='number' value=" . $produit->getQuantite() . " ></td>
                    <td>" . $produit->totalPrice() . " </td>
        
                </tr>           
                   
        ";

        $total += $produit->totalPrice();

    }

    echo "
        </tbody> 
        <tfoot>
            <tr>
                <td colspan='3'>TOTAL</td>
                <td id='grandTotal'>$total</td>
            </tr>
        </tfoot>
    ";
}

$html = ob_get_clean();
?>

<script src="script/updatePanier.js"></script>
<h2>Liste des produits</h2>

<table class="table" id="basket">
    <?= $html ?>
</table>

<a class='btn btn-primary' href='index.php?page=ctrlValiderCommande' role='button' style="display: <?= isset($_SESSION['panier']) && $_SESSION['panier'] ? 'block' :'none'; ?>">Valider la commande</a>
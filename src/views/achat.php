<!--

Creation de la vue des articles à sélectionner

-->
<?php
session_start();
require_once ROOT_PATH . "/libs/utils.php";

ob_start();

echo "<div class='row'>";

foreach ($produits as $produit) {
    echo "
<div class='col-3' >
    <form method='post'>
        <div class='form-group' >
        <img src=" . IMG_PRODUCTS_PATH . $produit->getPhotoProduit() . " style='width: 50%; height: 50%; inline: block' ><br>"
        . $produit->getDesignationProduit() . "     
        Prix: " . $produit->getPrixProduit() . "€<br>  
              
        <button type='submit' class='btn btn-primary' name='selectedProduct' value='" . $produit->getDesignationProduit() . "'>Ajouter</button>
        </div >
    </form>
</div>";

}
echo "</div>";
$htmlPanier = affichePanier();
$htmlArticles = ob_get_clean();

?>


<!--

Gestion des selections de l'utilisateur

-->
<?php
include_once CONNECT_PATH . 'Connexion.php';
include_once ENTITIES_PATH . 'ProduitsPanier.php';
include_once DAO_PATH . 'ProduitsDao.php';

$lcnx = Connexion::getConnection();



function inPanier($productTested)
{
    $result = false;
    foreach ($_SESSION['panier'] as $key => $value) {
        if ($key == $productTested) {
            $result = true;
        }
    }
    return $result;
}

/**
 * @param $lSelectedProduit
 * @param $lcnx
 */
function createPanierProduit($lSelectedProduit, $lcnx): void
{
    if (inPanier($lSelectedProduit)) {
        $produitPanierSerialise = $_SESSION['panier'][$lSelectedProduit];
        $produitPanier = unserialize($produitPanierSerialise);
        $produitPanier->setQuantite(($produitPanier->getQuantite()) + 1);
        $_SESSION['panier'][$lSelectedProduit] = serialize($produitPanier);

    } else {
        $produitBd = ProduitsDao::produitsSelectOneByDesignation($lcnx, array($lSelectedProduit));
        $produitPanier = new ProduitsPanier();

        $produitPanier
            ->setIdProduit($produitBd->getIdProduit())
            ->setDesignationProduit($lSelectedProduit)
            ->setPrixProduit($produitBd->getPrixProduit())
            ->setQuantite(1);

        $produitPanierSerialise = serialize($produitPanier);
        $_SESSION['panier'] += [$lSelectedProduit => $produitPanierSerialise];
    }
}


if (isset($_POST['selectedProduct'])) {

    $selectedProduit = $_POST['selectedProduct'];

    if (isset($_SESSION['panier'])) {
        createPanierProduit($selectedProduit, $lcnx);
        $htmlPanier = affichePanier();
    } else {
        $_SESSION['panier'] = [];
        createPanierProduit($selectedProduit, $lcnx);
        $htmlPanier = affichePanier();
    }

}

?>

<!--

    Vue

-->

<div class="row">
    <div class="col-9">
        <h2>Produits</h2>

        <div>

            <?= $htmlArticles ?>

        </div>

    </div>

    <div class="col-3" style="display:<?= (isset($_SESSION['panier'])) ? 'block' : 'none' ?>; background-color: lightgray">
        <h2>Panier</h2>
        <div>

            <?= $htmlPanier ?>
        </div>
    </div>
</div>
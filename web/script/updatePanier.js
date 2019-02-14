$(document).ready(function () {
    var $tbody = $("#basket tbody");

    $tbody.delegate("input", "change", function () {
        let produit = $(this).parent().prev().prev().text();
        let qt = $(this).val();

        window.location.assign("index.php?page=updateProduitPanier&produit=" + produit + "&quantite=" + qt);


    });
});

$(document).ready(function () {
    var $tbody = $("#appro tbody");

    $tbody.delegate("input", "change", function () {
        let produit = $(this).parent().prev().prev().prev().text();
        let qt = $(this).val();

        window.location.assign("index.php?page=ajoutProduitAppro&produit=" + produit + "&quantite=" + qt);




    });
});

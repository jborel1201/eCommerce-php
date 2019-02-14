<?php

include_once ENTITIES_PATH . 'Clients.php';

ob_start();

echo
    "<div class='form-group'>
        <label for='clientSelect'>Selectionner l'adresse de livraison:</label>
        <select class='form-control' id='clientSelect'  name='client'>";

foreach (unserialize($listeClients) as $client) {
    echo "<option value='".$client->getIdClient()."'>" . $client->getNomClient() . " " . $client->getPrenomClient() . " " . $client->getAdresseClient() . "</option>";
}

echo

        "</select>
        <br>
     </div>";


$html = ob_get_clean();

?>


<h2>Valider commande</h2>

<div class="row justify-content-center">
    <div class="col col-md-6">
        <form method="post" action="index.php?page=validerCommande">
        <?= $html ?>

            <div>
                <a class='btn btn-primary' href='index.php?page=#' role='button'>Ajouter une adresse</a>
            </div>
            <br>
            <button type='submit' class='btn btn-primary btn-block' value=''>Valider la commande</button>
        </form>
    </div>
</div>



<?php
session_start();

ob_start();

echo "<div>
<h3>Produits en stock</h3>";

foreach ($produits as $produit) {
    echo "

    <form method='post' action='index.php?page=updateProduits'>
        <div class='form-group' >  
            
            <label>Designation</label>
            <input type='text' name='designation' value='" . $produit->getDesignationProduit() . "'> 
            
              
            <label>Prix</label>
            <input type='number' step='0.01' name='prix' value='" . $produit->getPrixProduit() . "'>
            
           
            <label>Photo</label>
            <input type='text' name='photo' value='" . $produit->getPhotoProduit() . "'>
           
            <label>Categorie</label>
            <select name='categorie'>";

    foreach ($categories as $categorie){
        echo"
        <option value='".$mapCategorie[$categorie->getLibelleCategorie()]."' " . (($categorie->getIdCategorie() == $produit->getIdCategorie())?'selected="selected"':"").">".$categorie->getLibelleCategorie()."</option>
        ";

    }
            
            echo"</select>
            
            
                    
        <button type='submit' class='btn btn-danger' name='update' value='".$produit->getIdProduit()."'>Modifier</button>
        </div >
    </form>";


}
echo "
<h3>Produit à ajouter</h3>
 <form method='post'>
        <div class='form-group' style='background-color: grey' >  
            
            <label>Designation</label>
            <input type='text' name='designation' value=''> 
            
              
            <label>Prix</label>
            <input type='number' step='0.01' name='prix' value=''>
            
           
            <label>Photo</label>
            <input type='text' name='photo' value=''>
           
            <label>Categorie</label>
            <select name='categorie'>";

    foreach ($categories as $categorie){
        echo"
        <option value='".$mapCategorie[$categorie->getLibelleCategorie()]."' >".$categorie->getLibelleCategorie()."</option>
        ";

    }
            
            echo"</select>           
            
                    
        <button type='submit' class='btn btn-primary' name='update' value=''>Ajouter</button>
        </div >
    </form>
    </div>";

$html = ob_get_clean();

?>


<h2>Gestion des Produits</h2>

<div>

    <?= $html ?>

</div>


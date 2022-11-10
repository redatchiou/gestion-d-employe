<?php
  require("connexion.php");
 
  if (isset ($_POST['Libelle']) && isset($_POST['prix']) && isset($_POST['date']) && isset($_POST['photo']) && isset($_POST['cat'])  ) {
    $nom = $_POST['Libelle'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];
    $photo = $_POST['photo'];
    $cat = $_POST['cat'];
    $sql = 'INSERT INTO Produit(libelle,prixUnitaire,dateAchat,photoProduit,idCategorie) VALUES(:libelle, :prixUnitaire, :dateAchat, :photoProduit, :idCategorie)';
    $statement = $connection->prepare($sql);
    if ($statement->execute([':libelle' => $nom, ':prixUnitaire' => $prix, ':dateAchat' => $date, ':photoProduit' => $photo, ':idCategorie' => $cat])) {
      echo"Donnée créée avec succès";
      header("Location: Acuel.php");
     
      
    }
  }
?>


<?php require 'header.php'; ?>
<div class="container">
 <div class="card mt-5">
  <div class="card-header">
   <h2>Ajeuter Produit</h2>
  </div>
  <div class="card-body">
   
   <form method="post">
    <div class="form-group">
     <label for="">Libelle</label>
     <input type="text" name="Libelle" id="Libelle" class="form-control">
    </div>
    <div class="form-group">
     <label for="email">Prix Unitaire</label>
     <input type="text" name="prix" id="prix" class="form-control">
    </div>
    <div class="form-group">
     <label for="nom">Date D'achat</label>
     <input type="text" name="date" id="date" class="form-control">
    </div>
    <div class="form-group">
     <label for="nom">PHoto de produit</label>
     <input type="file" name="photo" id="photo" class="form-control">
    </div>
    <div class="form-group">
     <label for="">Categorie</label>
     <select name="cat" id="">
        <option value="">.........................</option>
         <option value=""><?php 
                    require("connexion.php");
                      $sql1 = "SELECT denomination FROM categorie ";
                      $stm = $connection->prepare($sql1);
                      $stm->execute();
                      $loc = $stm->fetch();
                      echo $loc['denomination']; 
                      ?></option> 
     </select>
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-info">Ajeuter</button>
    </div>
   </form>
  </div>
 </div>
</div>


<?php
session_start();

require("connexion.php");
$sql = 'SELECT * FROM produit';
$statement = $connection->prepare($sql);
$statement->execute();
$produit = $statement->fetchAll(PDO::FETCH_OBJ);
?>


<?php require("header.php"); ?>
<div class="container">
 <div class="card mt-5">
  <div class="card-header">
   <h2>TProduits</h2>
  </div>
  <div class="card-body">
   <table class="table table-bordered width-40px">
    <tr>
     <th>Reference</th>
     <th>Libbeele</th>
     <th>Prix Unitaire</th>
     <th>Date d'achat</th>
     <th>Photo de produit</th>
     <th>Categorie</th>
     <th>ACTION</th>
    </tr>
    <?php foreach($produit as $pro): ?>
     <tr>
      <td><?= $pro->reference; ?></td>
      <td><?= $pro->libelle; ?></td>
      <td><?= $pro->prixUnitaire; ?></td>
      <td><?= $pro->dateAchat; ?></td>
      <td><?= $pro->photoProduit; ?></td>
      <td><?php 
                        
                      require("connexion.php");
                      $sql1 = "SELECT denomination FROM categorie
                      INNER JOIN produit using(idCategorie)
                      WHERE categorie.idCategorie = '$pro->idCategorie'";
                      $stm = $connection->prepare($sql1);
                      $stm->execute();
                      $loc = $stm->fetch();
                      echo $loc['denomination']; 
                      ?></td>
      <td>
       <a href="modifier.php?reference=<?= $pro->reference ?>" class="btn btn-success"><img src="images_V2/pen.png" alt="" width="20px" height="20px"></a>
       <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement?')" href="suprimer.php?reference=<?= $pro->reference ?>" class='btn btn-danger'><img src="images_V2/trash.png" alt=""  width="20px" height="20px"></a>
      </td>
     </tr>
    <?php endforeach; ?>
   </table>
  </div>
 </div>
</div>


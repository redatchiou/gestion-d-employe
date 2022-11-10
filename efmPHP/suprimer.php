<?php
  require 'connexion.php';
  $reference = $_GET['reference']; 
  $sql = 'DELETE FROM produit WHERE reference=:reference';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':reference' => $reference])) {
    header("Location: Acuel.php");
  }
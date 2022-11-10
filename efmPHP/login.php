<?php 
require("connexion.php");
if (!empty($_GET['login'])&& !empty($_GET['login'])) {
    $a = $_GET['login'];
    $b = $_GET['pass'];
    $sql = "SELECT loginProp,motPasse FROM compteProprietaire WHERE loginProp = '$a' AND motPasse = '$b'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $ad = $stmt->fetch(PDO::FETCH_ASSOC);
    if (($a = $ad->loginProp) AND ($b = $ad->motPasse)) {
        session_start();
        header('Location:Acuel.php');
    }
    else{
        echo" Erreur de login/mot de passe.";
        // header('Location:login.php');
    }
    
}else {
    // echo"euillez saisir un login et un mot de passe";
  
}

?>
    




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container">

        <fieldset>
            <form action="" method="get">
            <legend><h1>Authentification</h1> </legend>
                <div class="mt-3 mb-3">
                <label for="titre" class="control-label">Login</label>
                <input type="text" class="form-control" name="login" placeholder="Login" required>
                </div>
                <div class="mt-3 mb-3">
                <label for="adresse" class="control-label">Le Mot de pass</label>
                <input type="password" class="form-control" name="pass" placeholder="le mot de pass" required>
                </div>
                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">S'euthentifient</button>
                </div>
                </form>
                
        </fieldset>
    </div>

</body>
</html>
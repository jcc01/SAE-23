<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="ajout.css">
</head>
<body>

<nav class="menu">

<a href="welcome.php" class="menu-item">Accueil</a>
<a href="ajout.php" class="menu-item">Ajout</a>
<a href="supprimer.php" class="menu-item">Supprimer</a>
<a href="chercher.php" class="menu-item">Chercher</a>
<a href="#" class="menu-item">Classer</a>
<a href="aleatoire.php" class="menu-item">Aléatoire</a>
<a href="reset-password.php" class="menu-item">Changer MDP</a>
<a href="logout.php" class="menu-item">Déconexion</a>

</nav>

    
</body>
</html>
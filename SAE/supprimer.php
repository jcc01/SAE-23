<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AJOUT Donnée</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="ajout.css">
  <script src="script.js"></script>
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

<div id="div_supprimer">

    <p id="titre">Supprimer données dans la BDD</p>
    <p id="desc">Veuillez rsaisir les infos pour la suppresion</p> 

    <form id="monForm" action="supprimer.php" method="get">
        
            <p>
                <label>Marque</label>
                <input type="text" name="MARQUE" placeholder="Marque"/>
            </p>
            <p>
                <label>Modele</label>
                <input type="text" name="MODELE" placeholder="Modele"/>
            </p>

    <div id="div2">
        <input type="submit" name="submit" />
        <input type="reset" name="reset" /> 

    </div>
</form>
</div>

<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

    try
    {
        // On se connecte à MySQL
        $mysqlClient = new PDO('mysql:host=localhost;dbname=db_CAPPELLE;charset=UTF8','22103661','Jean-christophe',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    if ( isset( $_GET['submit'] ) ) {

        $MARQUE = $_GET['MARQUE'];
        $MODELE = $_GET['MODELE'];

        $REQUETE = "DELETE FROM DBVOITURE WHERE MARQUE='" . $MARQUE . "' AND MODELE='" . $MODELE . "';";
        /*echo "La requete est :"."</br>";
        echo $REQUETE;*/

        $insert = $mysqlClient->prepare($REQUETE);
        $insert->execute();
    }

?>

</body>
</html>
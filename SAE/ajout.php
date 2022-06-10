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

<div id="div1">

    <p id="titre">Saisir des informations</p>
    <p id="desc">Les champs non renseignés auront une valeur par défaut</p> 
    
    <form id="monForm" action="ajout.php" method="get">
        
            <p>
                <label>Marque</label>
                <input type="text" name="MARQUE" placeholder="Marque"/>
            </p>
            <p>
                <label>Modele</label>
                <input type="text" name="MODELE" placeholder="Modele"/>
            </p>
            <p>
                <label>Cylindree</label>
                <input type="text" name="CYLINDREE" placeholder="Cylindree"/>
            </p>
            <p>
                <label>Puissance</label>
                <input type="text" name="PUISSANCE" placeholder="Puissance"/>
            </p>
            <p>
                <label>Couple</label>
                <input type="text" name="COUPLE" placeholder="Couple"/>
            </p>
            <p>
                <label>Consomation</label>
                <input type="text" name="CONSOMATION" placeholder="Consomation"/>
            </p>
            <p>
                <label>Poids</label>
                <input type="text" name="POIDS" placeholder="Poids"/>
            </p>
            <p>
                <label>Carburant</label>
                <input type="text" name="CARBURANT" placeholder="Carburant"/>
            </p>
            <p>
                <label>Transmission</label>
                <input type="text" name="TRANSMISSION" placeholder="Transmission"/>
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
        $CYLINDREE = $_GET['CYLINDREE'];
        $PUISSANCE = $_GET['PUISSANCE'];
        $COUPLE = $_GET['COUPLE'];
        $CONSOMATION = $_GET['CONSOMATION'];
        $POIDS = $_GET['POIDS'];
        $CARBURANT = $_GET['CARBURANT'];
        $TRANSMISSION = $_GET['TRANSMISSION'];

        /*echo '<h3>Informations récupérées en utilisant GET</h3>';*/
        /*echo "Champ 1 : " . $MARQUE . "Champ 2 : " . $MODELE . "Champ 3 : " . $CYLINDREE . "Champ 4 : " . $PUISSANCE . "Champ 5 : " . $COUPLE . "Champ 6 : " . $CONSOMATION . "Champ 7 : " . $POIDS . "Champ 8 : " . $CARBURANT . "Champ 9 : " . $TRANSMISSION . "</br>";*/
    
        $REQUETE = "INSERT INTO `DBVOITURE` (`ID`, `MARQUE`, `MODELE`, `CYLINDREE`, `PUISSANCE`, `COUPLE`, `CONSOMATION`, `POIDS`, `CARBURANT`, `TRANSMISSION`) VALUES (NULL, '". $MARQUE . "', '" . $MODELE . "', '" . $CYLINDREE . "', '" . $PUISSANCE . "', '" . $COUPLE . "', '" . $CONSOMATION . "', '" . $POIDS . "', '" . $CARBURANT . "', '" . $TRANSMISSION . "');";
        /*echo "La requete est :"."</br>";
        echo $REQUETE;*/

        $insert = $mysqlClient->prepare($REQUETE);
        $insert->execute();
    }

?>

</body>
</html>
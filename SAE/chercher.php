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

    <p id="titre">Recherche dans la BDD</p>
    <p id="desc">Veuillez sélectionner un critère de recherche puis écrire ce que vous cherchez</p> 
    
    <div id="bt_radio">

    <form method="GET">
        <input type="radio" name="mon_champ" value="MARQUE"/>MARQUE
        <input type="radio" name="mon_champ" value="MODELE"/>MODELE
        <input type="radio" name="mon_champ" value="CYLINDREE"/>CYLINDREE
        <input type="radio" name="mon_champ" value="PUISSANCE"/>PUISSANCE
        <input type="radio" name="mon_champ" value="COUPLE"/>COUPLE
        <input type="radio" name="mon_champ" value="CONSOMATION"/>CONSOMATION
        <input type="radio" name="mon_champ" value="POIDS"/>POIDS
        <input type="radio" name="mon_champ" value="CARBURANT"/>CARBURANT
        <input type="radio" name="mon_champ" value="TRANSMITION"/>TRANSMISSION
    </div>

    <div id="recherche">
        <input type="text" name="RECHERCHE" placeholder="Recherche"/>
    </div>

    <div id="soumettre">
        <input type="submit" name="submit" />
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

    if ( isset( $_GET['submit'] ) and  ( !empty($_GET['mon_champ']) ) ) {

        $RECHERCHE = $_GET['RECHERCHE'];
        $CHOIX = $_GET['mon_champ'];
        
        /*echo $RECHERCHE;*/
        /*echo $CHOIX;*/
        
        $REQUETE = "SELECT * FROM DBVOITURE WHERE " . $CHOIX . " LIKE '%" . $RECHERCHE . "%'";
        /*echo "La requete est :"."</br>";
        echo $REQUETE;*/

        $insert = $mysqlClient->prepare($REQUETE);
        $insert->execute();
        $reponse = $insert->fetchAll();

        echo "<div id='tableau'>";
        echo "<table>";
        foreach ($reponse as $x) {

            echo "<tr>";
            echo "<td>";
            print_r($x['MARQUE']);
            echo "</td>";
            echo "<td>";
            print_r($x['MODELE']);
            echo "</td>";
            echo "<td>";
            print_r($x['CYLINDREE']);
            echo "</td>";
            echo "<td>";
            print_r($x['PUISSANCE']);
            echo "</td>";
            echo "<td>";
            print_r($x['COUPLE']);
            echo "</td>";
            echo "<td>";
            print_r($x['CONSOMATION']);
            echo "</td>";
            echo "<td>";
            print_r($x['POIDS']);
            echo "</td>";
            echo "<td>";
            print_r($x['CARBURANT']);
            echo "</td>";
            echo "<td>";
            print_r($x['TRANSMISSION']);
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

    } else{
        echo "<div id='attention'>";
        echo "Veuillez cocher une CASE";
        echo "</div>";
    }

?>

</body>
</html>
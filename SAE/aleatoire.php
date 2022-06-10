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
<p id="titre">Voiture aléatoire dans la BDD</p>
<p id="desc">Appuyer sur le boutton pour faire apparaitre une voiture aléatoirement dans la base de donnée</p> 
<form method="GET">
    <div id="monForm">
        <div id="bt_alea">
            <input type="submit" name="submit" />
        </div>
    </div>
</form>

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

        $REQUETE = "SELECT * FROM DBVOITURE ORDER BY RAND() LIMIT 1;";
        /*echo "La requete est :"."</br>";
        echo $REQUETE;*/

        $insert = $mysqlClient->prepare($REQUETE);
        $insert->execute();
        $reponse = $insert->fetchAll();
        //print_r($reponse);

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
    }
?>

</body>
</html>
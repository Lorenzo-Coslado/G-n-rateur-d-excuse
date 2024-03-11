<?php
//Connexion à la base de données
require_once('connexion/connexion.php');

echo '<link rel="stylesheet" href="style/stylenav.css">';
echo '<link rel="stylesheet" href="style/styletraitement.css">';
include('navbar/navbar.html');

//Récupère l'id de la thématique sélectionnée par l'user
$id = $_POST['thématique'];

function RandomExcuse($id, $pdo) {
    // Requete SQL concut pour éviter les injections et pour obtenir tous les idExcuse pour un idThematique spécifique
    $query = $pdo->prepare('SELECT idExcuse FROM Excuses WHERE idThematique = ?');
    $query->bind_param('i', $id); 
    $query->execute();

    $result = $query->get_result();

    // Récupérer tous les idExcuse dans un tableau
    $idExcuses = array();
    while ($row = $result->fetch_assoc()) {
        $idExcuses[] = $row['idExcuse'];
    }

    // Choisir un idExcuse aléatoirement
    $randomKey = array_rand($idExcuses);
    $randomIdExcuse = $idExcuses[$randomKey];

    return $randomIdExcuse;
}

$randomExcuse = RandomExcuse($id, $pdo);

// Requete SQL concut pour éviter les injections et pour obtenir l'excuse aléatoire en fonction de la thématique
$querry = $pdo->prepare('SELECT * FROM Excuses WHERE idExcuse = ?');
$querry->bind_param('i', $randomExcuse); 
$querry->execute();

$result = $querry->get_result();
$arr = $result->fetch_assoc();

// Affiche l'excuse aléatoire
echo '<div class="center-container"> <div class="BigContainer"> '. $arr["excuse"] .'<button class="copyButton" data-clipboard-text="' . $arr['excuse'] . '<br> ">Copier</button> </div> </div>';

echo '<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>';
echo '<script>new Clipboard(".copyButton")</script>';
?>


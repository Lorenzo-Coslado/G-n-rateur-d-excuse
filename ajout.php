<?php
//Connexion à la base de données
require_once('connexion/connexion.php');

// Récupération des données du formulaire
$idThematique = $_POST['thématique'];
$newExcuse = $_POST['newExcuse'];

// Préparation de la requête SQL
$queryAjout = $pdo->prepare('INSERT INTO Excuses (idThematique, excuse) VALUES (?, ?)');
$queryAjout->bind_param('is', $idThematique, $newExcuse); // is = première variable est un integer et deuxième est un string
$queryAjout->execute();

header('Location: /index.html');
exit;
?>
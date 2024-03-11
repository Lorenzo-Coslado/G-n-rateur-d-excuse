<?php
require_once '../connexion/connexion.php';

$id_supprimer = $_POST['id_supprimer'];
$nouvelle_excuse = $_POST['nouvelle_excuse'];

//permet de vérifier la réception des data de la requete ajax
$log = "id_supprimer: " . var_export($id_supprimer, true);
file_put_contents('log_supp.txt', $log);

$querry = $pdo->prepare('DELETE FROM Excuses WHERE idExcuse = ?');
$querry->bind_param('i', $id_supprimer);
$querry->execute();

?>
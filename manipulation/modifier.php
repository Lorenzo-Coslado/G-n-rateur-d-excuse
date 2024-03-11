<?php
require_once '../connexion/connexion.php';

$id_modifier = $_POST['id_modifier'];
$nouvelle_excuse = $_POST['nouvelle_excuse'];

//permet de vérifier la réception des data de la requete ajax
$log = "id_modifier: " . var_export($id_modifier, true) . ", nouvelle_excuse: " . var_export($nouvelle_excuse, true);
file_put_contents('log_modif.txt', $log);

$querry = $pdo->prepare('UPDATE Excuses SET excuse = ? WHERE idExcuse = ?');
$querry->bind_param('si', $nouvelle_excuse, $id_modifier);
$querry->execute();

?>







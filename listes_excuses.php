<?php
//Connexion à la base de données
require_once('connexion/connexion.php');
echo '<link rel="stylesheet" href="style/stylenav.css">';
echo '<link rel="stylesheet" href="style/styleliste.css">';
include('navbar/navbar.html');

// Requete SQL concut pour éviter les injections et pour obtenir l'excuse aléatoire en fonction de la thématique
$querry = $pdo->prepare('SELECT * FROM Excuses');
$querry->execute();

$result = $querry->get_result();
$arr = $result->fetch_assoc();

while ($arr = $result->fetch_assoc()) {

  // Bouton Modifier Supprimer Copier
  echo '
  <div class="BigContainer">
    '.$arr['excuse'] . '<br>
    <div class="divButton">
      <button class="subButton" onclick="modifierExcuse(' . $arr['idExcuse'] . ')">Modifier</button>
      <button class="supButton" onclick="supprimerExcuse(' . $arr['idExcuse'] . ')">Supprimer</button>
      <button class="copyButton" data-clipboard-text="' . $arr['excuse'] . '">Copier</button>
    </div>  
  </div>';

}

echo '<script src="js/manipulation/modifier.js"></script>';
echo '<script src="js/manipulation/supprimer.js"></script>';
echo '<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.12/clipboard.min.js"></script>';
echo '<script>new Clipboard(".copyButton")</script>';

?>
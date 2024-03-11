function supprimerExcuse(id) {
  var nouvelleExcuse = window.prompt("Entrez `OUI JE SUIS SÛR` si vous voulez supprimer cette excuse :");

  if (nouvelleExcuse === "OUI JE SUIS SÛR") {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "manipulation/supprimer.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id_supprimer=" + id);
    xhr.addEventListener("load", function () {
      alert("L`excuse a été supprimé.");
      location.reload();
    });
  }
  else {
    alert("L`excuse n`a pas été supprimé.");
  }
}
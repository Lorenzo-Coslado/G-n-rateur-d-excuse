function modifierExcuse(id) {
  var nouvelleExcuse = window.prompt("Entrez la nouvelle excuse :");

  if (nouvelleExcuse) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "manipulation/modifier.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id_modifier=" + id + "&nouvelle_excuse=" + encodeURIComponent(nouvelleExcuse));
    xhr.addEventListener("load", function () {
      alert("L'excuse a été modifiée.");
      location.reload();
    });
  }
  else {
    alert("Vous n'avez pas entré de nouvelle excuse.");
  }
}
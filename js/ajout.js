let form_excuses = document.getElementById('formulaireAjoutExcuse');

function validateExcuse() {
  let newExcuse = document.getElementById('newExcuse').value;
  if (newExcuse.length < 20 || newExcuse.length > 100) {
      alert("L'excuse doit contenir entre 20 et 100 caractères.");
      return false;
  }
  let thematique = document.getElementById('thématique');
  let result = document.getElementById('result');
  result.innerHTML = `Votre excuse : ${newExcuse} <br> du theme ${thematique.value} est en cours d'ajout`;
  alert(`Votre excuse : ${newExcuse} , du theme ${thematique.value} a été ajoutée avec succès.`);
  return true;
}


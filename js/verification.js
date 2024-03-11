let form_excuses = document.getElementById('formulaireExcuse');

form_excuses.addEventListener('submit', () => {
  let thematique = document.getElementById('thématique');
  let result = document.getElementById('result');
  result.innerHTML = `Excuse du theme ${thematique.value} en génération`;
});

const input = document.querySelector('#input-diagnosis');
const addDiagnosisButton = document.querySelector('#add-diagnosis');
const removeDiagnosisButton = document.querySelector('#remove-diagnosis');
const diagnosesList = document.querySelector('#diagnoses-list');
const selected = document.querySelector('#selected');
let diagnoses = [];

addDiagnosisButton.addEventListener('click', () => {
  selectedDiagnoses(selected);
  input.value = diagnoses;

  diagnosesList.innerHTML = '';
  updateDiagnosesList();
});

removeDiagnosisButton.addEventListener('click', () => {
  diagnoses = [];
  diagnosesList.innerHTML = '';
});

function selectedDiagnoses(selected) {
  let value = selected.options[selected.selectedIndex].value;
  diagnoses.push(value);
}

function updateDiagnosesList() {
  diagnoses.forEach((diagnose) => {
    const listElement = document.createElement('li');
    listElement.innerText = diagnose;
    diagnosesList.appendChild(listElement);
    showSubmitButton();
  });
}

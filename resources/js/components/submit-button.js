const submitButton = document.querySelector('button[type=submit]');

function showSubmitButton() {
  if (checked = true && diagnoses.length > 0) {
    submitButton.style.display = 'block';
  } else {
    return false;
  }
}

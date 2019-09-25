const checkboxes = document.querySelectorAll('input[type=checkbox]');
let checked = false;

checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('click', () => {
    checked = true;
    showSubmitButton();
  });
});

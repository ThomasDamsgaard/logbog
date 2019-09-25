const input = document.querySelector('#input-diagnosis');
const addDiagnosisButton = document.querySelector('#add-diagnosis');
const removeDiagnosisButton = document.querySelector('#remove-diagnosis');
const selected = document.querySelector('#selected');
const submitButton = document.querySelector('button[type=submit]');
const diagnosesList = document.querySelector('#diagnoses-list');
const checkboxes = document.querySelectorAll('input[type=checkbox]');
const slider = document.getElementById('slider');
const age = document.getElementById('age');
let checked = false;
let diagnoses = [];

//Datepicker
$.fn.datepicker.defaults.format = "dd-mm-yyyy";
$.fn.datepicker.defaults.weekStart = 1;
$.fn.datepicker.defaults.daysOfWeekDisabled = [0, 6];
$.fn.datepicker.defaults.autoclose = true;
$('.datepicker').datepicker();
//Datepicker

//Dynamic dropdown
$('select[name="department"]').on('change', function(){
  const id = $(this).val().split('|', 1);
  // console.log(id[0]);
  if(id) {
    $.ajax({
      url: '/supervisors/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="supervisor"]').empty();
        $.each(data, function(key, value) {
          $('select[name="supervisor"]').append('<option value="'+ value +'">' + value + '</option>');
        });
      }
    });
  } else {
    $('select[name="supervisor"]').append('<option value="">Fejl</option>');
  }
});
//Dynamic dropdown

//Activity checkboxes
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('click', () => {
    checked = true;
    showSubmitButton();
  });
});
//Activity checkboxes

//Age slider
noUiSlider.create(slider, {
  start: [50],
  step: 10,
  range: {
    'min': [0],
    'max': [100]
  },

  // tooltips: true,
  format: wNumb({
    decimals: 0
  }),

  pips: {
  mode: 'steps',
  stepped: true,
  density: 2
  }
});

slider.noUiSlider.on('update', (value) => {
  age.value = value;
});
//Age slider

//Add diagnoses
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
//Add diagnoses

//Show submit button
function showSubmitButton() {
  if (checked = true && diagnoses.length > 0) {
    submitButton.style.display = 'block';
  } else {
    return false;
  }
}
//Show submit button

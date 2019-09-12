const slider = document.getElementById('slider');

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

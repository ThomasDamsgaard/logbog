{{-- <script type="text/javascript">
  const ctx = document.getElementById('canvas').getContext('2d');

  const json = {!! $query !!};

  const date = Date.now();

  console.log(json);
  console.log(date);

  const chart = {
    type: 'line',
    data: {
      labels: <?php echo json_encode($months); ?>,
      datasets: [
        {
          label: 'Anamnese',
          backgroundColor: '#444',
          borderWidth: 1,
          fill: false,
          data: {{ json_encode($data1) }}
        },
        {
          label: 'Klinisk US',
          backgroundColor: '#fff',
          borderWidth: 1,
          fill: false,
          data: {{ json_encode($data2) }}
        },
        {
          label: 'Journal',
          backgroundColor: '#aaa',
          borderWidth: 1,
          fill: false,
          data: {{ json_encode($data3) }}
        },

      ]
    },
    options: {
      scales: {
        // xAxes: [{
        //   type: 'time',
        //   time: {
        //
        //   }
        //   ticks: {
        //     beginAtZero: true,
        //
        //   }
        // }]
        yAxes: [{
          ticks: {
          beginAtZero:true
          }
        }]
      }
    }
  }
  new Chart(ctx, chart);
</script> --}}

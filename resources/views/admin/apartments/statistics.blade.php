@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-5">
  <div class="row">
    <div class="col">
      <canvas id="myChart" width="400"></canvas>
    </div>
  </div>
</div>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: {!! json_encode($labels) !!},
          datasets: [{
              label: 'Visualizzazioni',
              data: {!! json_encode($data) !!},
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
</script>

@endsection
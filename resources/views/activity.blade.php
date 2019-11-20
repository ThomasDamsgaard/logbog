@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <h3>Absolut og relativt aktivitets niveau -- ift eget hold</h3>
    <p>Der vises kun data for aktiviteter med hold-total n>5 og aktiviteter for hvilke der er defineret et minimumskrav.</p>
    <p>Sort: Dine aktiviteter. Blå: Gennemsnit for dit hold</p>
    <div class="row justify-content-center">
      <div class="col-md-8">
        {{-- <canvas id="canvas" width="90%"></canvas> --}}
        {!! $chart->container() !!}
      </div>

      {{-- <div class="col-md-4">

      </div>

      <div class="col-md-4">

      </div> --}}
    </div>
  </div>
@endsection

@section('javascript')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js" charset="utf-8"></script>
  {!! $chart->script() !!}
@endsection

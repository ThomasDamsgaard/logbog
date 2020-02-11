@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-12">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Dato</th>
              <th scope="col">Supervisor</th>
              <th scope="col">Afdeling</th>
              <th scope="col">Alder</th>
              <th scope="col">Køn</th>
              <th scope="col">Varighed</th>
              <th scope="col">Klage</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($minicexes as $key => $minicex)
              <tr data-href="{{ url('minicex/' . $minicex->id) }}">
                  <td>{{ $minicex->date->formatLocalized('%d %b') }}</td>
                  <td>{{ $minicex->supervisor->name }}</td>
                  <td>{{ $minicex->department->name }}</td>
                  <td>{{ $minicex->department->name }}</td>
                  <td>{{ $minicex->department->name }}</td>
                  <td>{{ $minicex->department->name }}</td>
                  <td>{{ $minicex->department->name }}</td>
                  <td>Slet</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script type="text/javascript">
    $(document).ready(function() {
      $(document.body).on("click", "tr[data-href]", function() {
        window.location.href = this.dataset.href;
      });
    });
  </script>
@endsection

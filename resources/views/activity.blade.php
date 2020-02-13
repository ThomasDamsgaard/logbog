@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="card">
      <div class="card-body">
        {{-- <h3>Absolut og relativt aktivitets niveau -- ift eget hold</h3>
        <p>Der vises kun data for aktiviteter med hold-total n>5 og aktiviteter for hvilke der er defineret et minimumskrav.</p>
        <p>Sort: Dine aktiviteter. Blå: Gennemsnit for dit hold</p> --}}
        {{-- <div class="row justify-content-center">
          <div class="col-md-8"> --}}
            {{-- <canvas id="canvas" width="90%"></canvas> --}}
            {{-- {!! $chart->container() !!}
          </div>
        </div> --}}
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
                </tr>
              </thead>
              <tbody>
                @forelse ($minicexes as $key => $minicex)
                  <tr data-href="{{ url('minicex/' . $minicex->id) }}">
                      <td>{{ $minicex->date->formatLocalized('%d %b') }}</td>
                      <td>{{ $minicex->supervisor->name }}</td>
                      <td>{{ $minicex->department->name }}</td>
                      <td>{{ $minicex->clinical->age }}</td>
                      <td>{{ $minicex->clinical->sex }}</td>
                      <td>{{ $minicex->clinical->duration }}</td>
                      <td>{{ $minicex->clinical->primary_pain }}</td>
                  </tr>
                @empty
                  <tr>
                      <td>Du</td>
                      <td>har</td>
                      <td>ikke</td>
                      <td>udfyldt</td>
                      <td>en</td>
                      <td>MiniCEX</td>
                      <td>endnu</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('javascript')
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js" charset="utf-8"></script> --}}
  {{-- {!! $chart->script() !!} --}}

  <script type="text/javascript">
    $(document).ready(function() {
      $(document.body).on("click", "tr[data-href]", function() {
        window.location.href = this.dataset.href;
        // console.log('hfjck');
      });
    });
  </script>
@endsection

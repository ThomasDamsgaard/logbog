@extends('layouts.app')

@section('css')
  <style media="screen">

  </style>
@endsection

@section('content')
<form action="" method="POST">
  <div class="container py-4">
    <div class="row justify-content-center">
      @csrf

      <div class="col-md-4">
        <div class="form-group">
          <label>Dato</label>
          <input class="form-control" data-provide="datepicker" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
        </div>

        <div class="form-group">
          <label>Afdeling</label>
          <select class="form-control" name="department" data-dependent="supervisor">
            @foreach ($departments as $department)
              <option value="{{ $department->id }}">{{ $department->departments }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Supervisorer</label>
          <select id="supervisor" class="form-control" name="supervisor">
            @foreach ($supervisors as $supervisor)
              <option value="{{ $supervisor->name }}">{{ $supervisor->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Aktivitet</label>

          @foreach ($activities as $activity)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="activities[]">
              <label class="form-check-label">
                {{ $activity->activities }}
              </label>
            </div>
          @endforeach

        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group" style="margin-bottom: 2.2rem;">
          <label>Patient Alder</label>
          <div id="slider"></div>
        </div>

        <div class="form-group">
          <label>Patient køn</label>
          <select class="form-control">
            <option value="Mand">Mand</option>
            <option value="Kvinde">Kvinde</option>
            <option value="Andet">Andet</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varighed</label>
          <select class="form-control">
            <option value="Akut/Subakut">Akut/Subakut</option>
            <option value="Kronisk">Kronisk</option>
            <option value="Recidiverende">Recidiverende</option>
          </select>
        </div>

        <div class="form-group">
          <label>Primær klage</label>
          <select class="form-control">
            <option value="Akut/Subakut">Lænderyg</option>
            <option value="Kronisk">Kronisk</option>
            <option value="Recidiverende">Recidiverende</option>
          </select>
        </div>

        <div class="form-group">
          <label>Diagnosekode</label>
          <select class="form-control mb-2">
            <option value="Akut/Subakut">DM545 - Lændesmerter UNS</option>
            <option value="Kronisk">Kronisk</option>
            <option value="Recidiverende">Recidiverende</option>
          </select>
          <button type="button" class="btn btn-dark">Tilføj Diagnose</button>
          <button type="button" class="btn btn-secondary">Ryd</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Bedømmelse af supervisor</label>
          <input type="integer" class="form-control" name="" value="000000000">
        </div>

        <div class="form-group">
          <label>Supervisors bedømmelse</label>
          <input type="integer" class="form-control" name="" value="0000000000">
        </div>

        <p>...svarende til scoren 0-9 for hver linie (0='Ikke obs.')</p>
        <p>Eksemplet herunder skal indtastes som '355600000'</p>

        <button type="submit" class="btn btn-primary">Tilføj MiniCEX</button>

      </div>

    </div>
  </div>
</form>

@endsection

@section('javascript')
  {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> --}}
  <script type="text/javascript">
  $(document).ready(function() {





});
  </script>
@endsection

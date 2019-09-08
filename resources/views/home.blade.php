@extends('layouts.app')

@section('content')
<form action="" method="POST">
  <div class="container py-4">
    <div class="row justify-content-center">
      @csrf

      <div class="col-md-4">
        <div class="form-group">
          <label>Dato</label>
          <div class="input-group date" data-provide="datepicker">
            <input type="text" class="form-control" data-date-format="dd-mm-yyyy" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
          </div>
        </div>

        <div class="form-group">
          <label>Afdeling</label>
          <input type="string" class="form-control" name="" value="">
        </div>

        <div class="form-group">
          <label>Supervisorer</label>
          <input type="string" class="form-control" name="" value="">
        </div>

        <div class="form-group">
          <label>Aktivitet</label>

          @foreach ($activities as $activity)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="activities[]">
              <label class="form-check-label" for="defaultCheck1">
                {{ $activity }}
              </label>
            </div>
          @endforeach

        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Afdeling</label>
          <input type="string" class="form-control" name="" value="">
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
          <button type="button" class="btn btn-primary">Tilføj Diagnose</button>
          <button type="button" class="btn btn-secondary">Ryd</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label>Bedømmelse af supervisor</label>
          <input type="integer" class="form-control" name="" value="">
        </div>

        <div class="form-group">
          <label>Supervisors bedømmelse</label>
          <input type="integer" class="form-control" name="" value="">
        </div>

        <p>...svarende til scoren 0-9 for hver linie (0='Ikke obs.')</p>
        <p>Eksemplet herunder skal indtastes som '355600000'</p>
      </div>

    </div>
  </div>
</form>

@endsection

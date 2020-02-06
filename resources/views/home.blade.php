@extends('layouts.app')

@section('content')
<form action="{{ route('minicex.store') }}" method="POST">
  <div class="container py-4">
    <div class="row justify-content-center">
      @csrf

      {{-- Div 1 --}}
      <div class="col-md-4">
        <div class="form-group">
          <label>Dato</label>
          <input class="form-control" name="date" data-provide="datepicker" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
        </div>

        <div class="form-group">
          <label>Afdeling</label>
          <select class="form-control" name="department" data-dependent="supervisor">
            @foreach ($departments as $department)
              <option value="{{ $department->id }}|{{ $department->name }}">{{ $department->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Supervisorer</label>
          <select id="supervisor" class="form-control" name="supervisor">
            @foreach ($supervisors as $supervisor)
              <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Aktivitet</label>

          @foreach ($activities as $activity)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="activities[]" value="{{ $activity->activity }}">
              <label class="form-check-label">
                {{ $activity->activity }}
              </label>
            </div>
          @endforeach

        </div>
      </div>
      {{-- Div 1 --}}

      {{-- Div 2 --}}
      <div class="col-md-4">
        <div class="form-group" style="margin-bottom: 2.2rem;">
          <label>Patient Alder</label>
          <div id="slider"></div>
          <input id="age" type="hidden" name="age" value="50">
        </div>

        <div class="form-group">
          <label>Patient køn</label>
          <select class="form-control" name="sex">
            <option value="1">Mand</option>
            <option value="2">Kvinde</option>
            <option value="3">Andet</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varighed</label>
          <select class="form-control" name="duration">
            <option value="1">Akut/Subakut</option>
            <option value="2">Kronisk</option>
            <option value="3">Recidiverende</option>
          </select>
        </div>

        <div class="form-group">
          <label>Primær klage</label>
          <select class="form-control" name="complaint">
            @foreach ($complaints as $complaint)
              <option value="{{ $complaint->primary_pain }}">{{ $complaint->primary_pain }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Diagnosekode</label>
          <select id="selected" class="form-control mb-2">
            @foreach ($diagnoses as $diagnosis)
              <option value="{{ $diagnosis->diagnosis }}">{{ $diagnosis->diagnosis }}</option>
            @endforeach
          </select>
          <input id="input-diagnosis"type="hidden" name="diagnosis" value="">
          <button id="add-diagnosis" type="button" class="btn btn-dark">Tilføj Diagnose</button>
          <button id="remove-diagnosis" type="button" class="btn btn-secondary">Ryd</button>
        </div>

        {{-- Diagnoses list --}}
        <ul id="diagnoses-list"></ul>
        {{-- Diagnoses list --}}

      </div>
      {{-- Div 2 --}}

      {{-- Div 3 --}}
      <div class="col-md-4">
        <div class="form-group">
          <label>Bedømmelse af supervisor</label>
          <input type="text" class="form-control" name="studentrating" pattern="[0-9]{7}" placeholder="0000000" required>
        </div>

        <div class="form-group">
          <label>Supervisors bedømmelse</label>
          <input type="text" class="form-control" name="supervisorrating" pattern="[0-9]{9}" placeholder="000000000" required>
        </div>

        <p>...svarende til scoren 0-9 for hver linie (0='Ikke obs.')</p>
        <p>Eksemplet herunder skal indtastes som '355600000'</p>

        <img src="{{ asset('img/miniCEX.png') }}" class="img-fluid mb-3" style="max-width: 75%;"alt="MiniCEX">

        <button type="submit" class="btn btn-primary" style="display: none;">Tilføj MiniCEX</button>

      </div>
      {{-- Div 3 --}}

    </div>
  </div>
</form>


      @if (Auth::user()->team_id == null)


<div class="modal fade" id="assign-to-team-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

        <div class="modal-header">
          <div class="container">
            <form action="{{ route('user.update') }}" method="POST">
              @csrf
              <div class="row text-center">
                <label class="col-form-label col-sm-4 mb-2 mb-sm-0">Tilmeld dig et hold</label>
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <select class="form-control" name="id">
                    @foreach ($teams as $team)
                      <option value="{{ $team->id }}">{{ $team->b_start->formatLocalized('%b %Y') }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-primary">Tilmeld</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </div>
  </div>
      @endif

@endsection

@section('javascript')
  <script type="text/javascript">
  $(document).ready(function() {
    $('#assign-to-team-modal').modal('show');
  });
  </script>
@endsection

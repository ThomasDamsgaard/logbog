@extends('layouts.app')

@section('css')
  <style media="screen">

  </style>
@endsection

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
              <option value="{{ $department->id }}|{{ $department->departments }}">{{ $department->departments }}</option>
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
              <input class="form-check-input" type="checkbox" name="activities[]" value="{{ $activity->activities }}">
              <label class="form-check-label">
                {{ $activity->activities }}
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
            <option value="Mand">Mand</option>
            <option value="Kvinde">Kvinde</option>
            <option value="Andet">Andet</option>
          </select>
        </div>

        <div class="form-group">
          <label>Varighed</label>
          <select class="form-control" name="duration">
            <option value="Akut/Subakut">Akut/Subakut</option>
            <option value="Kronisk">Kronisk</option>
            <option value="Recidiverende">Recidiverende</option>
          </select>
        </div>

        <div class="form-group">
          <label>Primær klage</label>
          <select class="form-control" name="complaint">
            @foreach ($complaints as $complaint)
              <option value="{{ $complaint->complaint }}">{{ $complaint->complaint }}</option>
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
          <button type="button" class="btn btn-secondary">Ryd</button>
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
          <input type="text" class="form-control" name="studentrating" pattern="[0-9]{8}" placeholder="00000000" required>
        </div>

        <div class="form-group">
          <label>Supervisors bedømmelse</label>
          <input type="text" class="form-control" name="supervisorrating" pattern="[0-9]{9}" placeholder="000000000" required>
        </div>

        <p>...svarende til scoren 0-9 for hver linie (0='Ikke obs.')</p>
        <p>Eksemplet herunder skal indtastes som '355600000'</p>

        <img src="{{ asset('img/miniCEX.png') }}" class="img-fluid mb-3" style="max-width: 75%;"alt="MiniCEX">

        <button type="submit" class="btn btn-primary">Tilføj MiniCEX</button>

      </div>
      {{-- Div 3 --}}

    </div>
  </div>
</form>

@endsection

@section('javascript')
  <script type="text/javascript">
  $(document).ready(function() {
    const input = document.querySelector('#input-diagnosis');
    const addDiagnosisButton = document.querySelector('#add-diagnosis');
    const selected = document.querySelector('#selected');
    const submitButton = document.querySelector('button[type=submit]');
    const diagnosesList = document.querySelector('#diagnoses-list');
    let diagnoses = [];

    addDiagnosisButton.addEventListener('click', () => {
      selectedDiagnoses(selected);
      input.value = diagnoses;

      diagnosesList.innerHTML = '';
      updateDiagnosesList();
      // console.log(diagnoses);
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
      });
    }


  });
  </script>
@endsection

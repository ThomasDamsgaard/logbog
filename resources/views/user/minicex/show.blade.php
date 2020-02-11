@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="card">
      <div class="card-body">
        <div class="row justify-content-center mb-3">
          {{-- Div 1 --}}
          <div class="col-md-4">
            <div class="form-group">
              <label>Dato</label>
              <input class="form-control" type="text" placeholder="{{ $minicex->date->formatLocalized('%d %b %Y') }}" readonly>
            </div>

            <div class="form-group">
              <label>Afdeling</label>
              <input class="form-control" type="text" placeholder="{{ $minicex->department->name }}" readonly>
            </div>

            <div class="form-group">
              <label>Supervisor</label>
              <input class="form-control" type="text" placeholder="{{ $minicex->supervisor->name }}" readonly>
            </div>

          </div>
          {{-- Div 1 --}}

          {{-- Div 2 --}}
          <div class="col-md-4">
            <div class="form-group">
              <label>Patient Alder</label>
                <input class="form-control" type="text" placeholder="{{ $minicex->clinical->age }}" readonly>
            </div>



            <div class="form-group">
              <label>Varighed</label>
                <input class="form-control" type="text" placeholder="{{ $minicex->clinical->duration }}" readonly>
            </div>

            <div class="form-group">
              <label>Primær klage</label>
                <input class="form-control" type="text" placeholder="{{ $minicex->clinical->primary_pain }}" readonly>
            </div>


          </div>
          {{-- Div 2 --}}

          {{-- Div 3 --}}
          <div class="col-md-4">
            <div class="form-group">
              <label>Patient køn</label>
                <input class="form-control" type="text" placeholder="{{ $minicex->clinical->sex }}" readonly>
            </div>
            <div class="form-group">
              <label>Aktivitet(er)</label>
              <ul>
                @foreach ($minicex->activities as $activity)
                  <li>{{ $activity }}</li>
                @endforeach
              </ul>
            </div>
            <div class="form-group">
              <label>Diagnosekode(r)</label>
              <ul>
                @foreach ($minicex->clinical->icd10 as $value)
                  <li>{{ $value }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          {{-- Div 3 --}}
        </div>
        <div class="row justify-content-center">
          <div class="col-md-4">
            <form action="{{ route('minicex.delete', $minicex) }}" method="POST" onsubmit="return confirm('Er du sikker på du vil slette denne MiniCEX? Den kan ikke genskabes')">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-primary btn-block">Slet MiniCEX</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

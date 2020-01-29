@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="{{ route('supervisor.store') }}" method="POST">
          @csrf

          <div class="card">
            <div class="card-body">
              <p class="text-center">Tilføj supervisor</p>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Navn</label>
                    <input type="string" class="form-control" name="name" placeholder="Hans Hansen" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Profession</label>
                    <select class="form-control" name="profession">
                      @foreach ($professions as $profession)
                        <option value="{{ $profession->id }}">{{ $profession->profession }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <input type="hidden" name="active" value="1">

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Afdeling</label>
                    <select class="form-control" name="department">
                      @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary">Tilføj Supervisor</button>
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <form class="" action="index.html" method="post">

        </form>
      </div>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="" action="index.html" method="post">
          <div class="card">
            <div class="card-body">
              <p class="text-center">Tilføj supervisor</p>
              <div class="form-group">
                <label>Navn</label>
                <input type="string" class="form-control" name="supervisor" placeholder="Hans Hansen" required>
              </div>
              <div class="form-group">
                <label>Navn</label>
                <select class="form-control" name="profession">
                  <option value="1">Kiropraktor</option>
                  <option value="2"></option>
                  <option value="3">Andet</option>
                </select>
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

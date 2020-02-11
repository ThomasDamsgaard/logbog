@extends('layouts.app')

@section('content')
  <form action="{{ route('team.store') }}" method="POST">
    @csrf
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold B - Start</label>
                    <input class="form-control" name="b_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold B - Slut</label>
                    <input class="form-control" name="b_end" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold C - Start</label>
                    <input class="form-control" name="c_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold C - Slut</label>
                    <input class="form-control" name="c_end" data-provide="datepicker" value="">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold D - Start</label>
                    <input class="form-control" name="d_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold D - Slut</label>
                    <input class="form-control" name="d_end" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold E - Start</label>
                    <input class="form-control" name="e_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold E - Slut</label>
                    <input class="form-control" name="e_end" data-provide="datepicker" value="">
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold F - Start</label>
                    <input class="form-control" name="f_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold F - Slut</label>
                    <input class="form-control" name="f_end" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold G - Start</label>
                    <input class="form-control" name="g_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold G - Slut</label>
                    <input class="form-control" name="g_end" data-provide="datepicker" value="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold H - Start</label>
                    <input class="form-control" name="h_start" data-provide="datepicker" value="">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Klinikophold H - Slut</label>
                    <input class="form-control" name="h_end" data-provide="datepicker" value="">
                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary">Opret hold</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

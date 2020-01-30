@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-3">
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
      <div class="col-md-6 mb-3">
        <form action="{{ route('department.store') }}" method="POST">
          @csrf

          <div class="card">
            <div class="card-body">
              <p class="text-center">Tilføj afdeling</p>
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Afdelingsnavn</label>
                    <input type="string" class="form-control" name="name" placeholder="Middelfart Rygcenter" required>
                  </div>
                </div>

                <input type="hidden" name="active" value="1">

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Tilføj Afdeling</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6 mb-3">
        <form action="{{ route('supervisor.status.change') }}" method="POST">
          @csrf

          <div class="card">
            <div class="card-body">
              <p class="text-center">Ændre supervisor status</p>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Afdeling</label>
                    <select class="form-control" name="department" data-dependent="supervisor">
                      @foreach ($departments as $department)
                        <option value="{{ $department->id }}|{{ $department->name }}">{{ $department->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Supervisor</label>
                    <select id="supervisor" class="form-control" name="supervisor" data-dependent="active">
                      @foreach ($supervisors as $supervisor)
                        <option value="{{ $supervisor->id }}|{{ $supervisor->active }}">{{ $supervisor->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="active">
                        @if ($status->active == 1)
                          <option selected value="1">Aktiv</option>
                          <option value="0">Inaktiv</option>
                        @else
                          <option value="1">Aktiv</option>
                          <option selected value="0">Inaktiv</option>
                        @endif
                    </select>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Ændre status</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6 mb-3">
        <form action="{{ route('department.status.change') }}" method="POST">
          @csrf

          <div class="card">
            <div class="card-body">
              <p class="text-center">Ændre afdelings status</p>
              <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Afdeling</label>
                      <select class="form-control" name="department_status" data-dependent="department_active">
                        @foreach ($departments as $department)
                          <option value="{{ $department->id }}|{{ $department->active }}">{{ $department->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="department_active">
                          @if ($department->active == 1)
                            <option selected value="1">Aktiv</option>
                            <option value="0">Inaktiv</option>
                          @else
                            <option value="1">Aktiv</option>
                            <option selected value="0">Inaktiv</option>
                          @endif
                      </select>
                    </div>
                  </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Ændre status</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection

@section('javascript')
<script type="text/javascript">
$('select[name="supervisor"]').on('change', function(){
  const id = $(this).val().split('|', 2);
  if(id[1] == 1) {
    $.ajax({
      url: '/supervisors/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="active"]').empty();
        $('select[name="active"]').append('<option selected value="1">Aktiv</option>');
        $('select[name="active"]').append('<option value="0">Inaktiv</option>');
      }
    });
  } else if (id[1] == 0){
    $.ajax({
      url: '/supervisors/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="active"]').empty();
        $('select[name="active"]').append('<option value="1">Aktiv</option>');
        $('select[name="active"]').append('<option selected value="0">Inaktiv</option>');
      }
    });
  } else {
    $('select[name="active"]').empty();
    $('select[name="active"]').append('<option value="">Fejl - Kontakt Søren</option>');
  }
});

$('select[name="department_status"]').on('change', function(){
  const id = $(this).val().split('|', 2);
  console.log(id);
  if(id[1] == 1) {
    $.ajax({
      url: '/departments/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="department_active"]').empty();
        $('select[name="department_active"]').append('<option selected value="1">Aktiv</option>');
        $('select[name="department_active"]').append('<option value="0">Inaktiv</option>');
      }
    });
  } else if (id[1] == 0){
    $.ajax({
      url: '/departments/active/get/'+ id,
      type:"GET",
      dataType:"json",
      success:function(data) {
        $('select[name="department_active"]').empty();
        $('select[name="department_active"]').append('<option value="1">Aktiv</option>');
        $('select[name="department_active"]').append('<option selected value="0">Inaktiv</option>');
      }
    });
  } else {
    $('select[name="department_active"]').empty();
    $('select[name="department_active"]').append('<option value="">Fejl - Kontakt Søren</option>');
  }
});
</script>
@endsection

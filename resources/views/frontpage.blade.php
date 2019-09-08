@extends('layouts.app')

@section('css')
<style>
  .masthead {
    height: 100vh;
    min-height: 500px;
    background: rgb(230,231,225);
    background: -moz-linear-gradient(top, rgba(230,231,225,1) 0%, rgba(238,239,234,1) 100%);
    background: -webkit-linear-gradient(top, rgba(230,231,225,1) 0%,rgba(238,239,234,1) 100%);
    background: linear-gradient(to bottom, rgba(230,231,225,1) 0%,rgba(238,239,234,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6e7e1', endColorstr='#eeefea',GradientType=0 );
    }

    .form-signin {
    width: 100%;
    max-width: 420px;
    padding: 15px;
    margin: auto;
}
</style>

@endsection

@section('content')
<div class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center">

      <form class="form-signin" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="text-center mb-4">
            <h1 class="h3">Registrer dine patienter</h1>

          </div>

          <div class="form-group mb-4">
            <label for="students">Studerende</label>
                  <input id="students" type="students" class="form-control @error('students') is-invalid @enderror" name="students" value="{{ old('students') }}" required autofocus>

                  @error('students')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          <div class="form-group mb-4">
              <label for="password">Kodeord</label>

                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
          </div>

          <div class="form-group mb-0">
                  <button type="submit" class="btn btn-primary btn-block">
                      {{ __('Login') }}
                  </button>
          </div>
      </form>

    </div>
  </div>
</div>
@endsection

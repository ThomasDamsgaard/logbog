@extends('layouts.app')

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
          <label for="email">Studerende</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

              @error('email')
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
            {{ __('Log ind') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

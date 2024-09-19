@extends('layouts.auth')
@section('auth-page')
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>{{ $titles->title_login1 }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{ $titles->title_login2 }}</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="number" required="" id="phone" name="phone" autocomplete="phone-off" value="{{ old('phone') }}" placeholder="Nomor Telepon *" autofocus class="form-control" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required="" type="password" id="password" name="password" autocomplete="chrome-off" placeholder="Kata Sandi *" class="form-control" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
@endsection


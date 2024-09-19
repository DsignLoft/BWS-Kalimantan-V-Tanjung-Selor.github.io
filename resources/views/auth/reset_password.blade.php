@extends('layouts.auth')
@section('auth-page')
    <div class="dengan mb-2">Check pesan whatsapp pelanggan untuk mendapatkan <strong>PIN</strong></div>
    <div class="alert alert-warning" role="alert">
        Pastikan PIN sesuai dengan format yang kami kirimkan melalui whatsapp!
    </div>
    <form class="form" method="POST" action="{{ route('reset.password') }}" enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="wrap-input mt-3">
            <i class="far fa-user"></i> <span class="label-input">No. telp</span>
            <x-input class="input" type="text" name="phone" value="{{ $phone }}" readonly />
            <span class="focus-input"></span>
        </div>

        <div class="wrap-input mt-3">
            <i class="far fa-cog"></i> <span class="label-input">PIN</span>
            <x-input class="input" type="text" name="pin" value="{{ old('pin') }}" autofocus />
            <span class="focus-input"></span>
        </div>

        <div class="wrap-input mt-3">
            <i class="far fa-lock"></i><span class="label-input">Password Baru</span>
            <x-input class="input password" type="password" autocomplete="chrome-off" />
            <span class="show-password far fa-eye"></span>
            <span class="focus-input"></span>
        </div>

        <div class="wrap-input mt-3">
            <i class="far fa-key"></i><span class="label-input">Konfirmasi Password</span>
            <x-input class="input password" type="password" name="password" id="txtConfirmPassword" autocomplete="chrome-off" />
            <span class="show-password far fa-eye"></span>
            <span class="focus-input"></span>
        </div>

        <button type="submit" class="btn btn-success mt-3" id="submit">
            <div class="button-login">
                <span>
                    Ganti Kata Sandi
                </span>
            </div>
        </button>
    </form>
@endsection

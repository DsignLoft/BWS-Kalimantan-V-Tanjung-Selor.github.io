@extends('layouts.auth')
@section('auth-page')
    <div class="title">Lupa password ?</div>
    <div style="margin-bottom: 30px;" class="dengan">Jangan khawatir. Tuliskan <b>nomor telepon</b> yang sudah terdaftar untuk melakukan reset password. Pastikan nomor telepon sudah terdaftar whatsapp.</div>
    <form class="form" method="POST" action="{{ route('check.account') }}" id="myForm">
        @csrf
        <div class="wrap-input">
            <i class="far fa-user">
            </i>
            <span class="label-input">No. telp (Whatsapp)</span>
            <input class="input" type="text" name="phone" value="{{ old('phone') }}" autocomplete="phone-off" autofocus>
            <span class="focus-input"></span>
        </div>

        <button type="submit" class="btn btn-success mt-3" id="submit">
            <div class="button-login">
                <span>
                    Kirim Permintaan
                </span>
            </div>
        </button>
    </form>
@endsection

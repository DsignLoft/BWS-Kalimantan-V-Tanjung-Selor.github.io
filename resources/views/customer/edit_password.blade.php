@extends('layouts.profile')
@section('profile')
    <div class="card shadow p-3">
        <x-alert />
        <x-auth.validate-error />
        <form action="{{ route('save.password') }}" method="POST" class="form-horizontal formAddProduct" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password baru</label>
                <div class="col-sm-10">
                    <x-input type="password" name="password" id="password2" />
                    <span class="show-password far fa-eye" data-pass='2'></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Konfirmasi password</label>
                <div class="col-sm-10">
                    <x-input type="password" name="password_confirmation" id="password3" />
                    <span class="show-password far fa-eye" data-pass='3'></span>
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-warning" type="submit">Update Password</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".show-password").click(function() {
                let y = $(this).data("pass");
                let x = $('#password' + y).attr('type');
                if (x == 'password') {
                    $('#password' + y).attr('type', 'text');
                } else {
                    $('#password' + y).attr('type', 'password');

                }
            });
        });
    </script>

@endsection

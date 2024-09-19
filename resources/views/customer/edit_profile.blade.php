@extends('layouts.profile')
@section('profile')
    <div class="card shadow p-3">
        <x-alert />
        <x-auth.validate-error />
        <form action="{{ route('save.profile') }}" method="POST" class="form-horizontal formAddProduct">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <x-input style="height: 130%" type="text" name="name" value="{{ old('name') ?? Auth()->user()->name }}" />
                    @if (!Auth()->user()->name)
                        <small class="text-danger">Harap masukkan nama agar pelanggan bisa checkout</small>
                    @endif
                </div>
            </div>

            <div class="form-group row" style="margin-top: 5%">
                <label for="name" class="col-sm-2 col-form-label">E-mail
                    <small class="text-danger">(optional)</small>
                </label>
                <div class="col-sm-10">
                    <x-input style="height: 130%" type="text" name="email" value="{{ old('email') ?? Auth()->user()->email }}" />
                </div>
            </div>

            <div class="form-group row" style="margin-top: 5%">
                <label for="name" class="col-sm-2 col-form-label">No. Telepon</label>
                <div class="col-sm-10">
                    <x-input style="height: 130%" type="text" name="phone" value="{{ old('phone') ?? Auth()->user()->phone }}" />
                </div>
            </div>
            <div class="text-right" style="margin-top: 5%">
                <button class="btn btn-info" type="submit">Edit Profile</button>
            </div>
        </form>
    </div>

@endsection

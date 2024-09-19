@extends('layouts.profile')
@section('profile')
    <x-alert />
    @php setcookie('session_userdata',Auth()->id(), time()+(3600*24),null,'sorcerer.indoprinting.infogotalent.com'); @endphp
    <div class="text-center">
        <div class="row">
            <div class="col-md-4">
                <a href="">
                    <img src="{{ asset('assets/images/games/sorcerer.png') }}" alt="Indoprinting Games" />
                </a>
            </div>
        </div>
    </div>
@endsection
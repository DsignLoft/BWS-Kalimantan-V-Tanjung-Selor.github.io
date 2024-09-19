@extends('layouts.profile')
@section('profile')
    <x-alert />
    @if (count($affiliate) > 0)
        @foreach($affiliate as $customer)
            @if($customer->affiliate_status == 'pending')
                <div class="text-center"><h4 class="text-warning">MENUNGGU PERSETUJUAN</h4></div>
                <div class="card mt-4">
                    <p><a href="{{ route('program.affiliate') }}" target="_blank">Baca Syarat dan Ketentuan disini</a></p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <b>Tanggal Pengajuan</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_date }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($customer->affiliate_status == 'review')
                <div class="text-center"><h4 class="text-info">MELAKUKAN REVIEW AKUN ANDA</h4></div>
                <div class="card mt-4">
                    <p><a href="{{ route('program.affiliate') }}" target="_blank">Baca Syarat dan Ketentuan disini</a></p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <b>Tanggal Pengajuan</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_date }}" readonly>
                            </div>
                            @if($customer->affiliate_status == 'review')
                                <div class="col-md-12 mt-3">
                                    <b>Tanggal Review</b> <br />
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->date_review }}" readonly>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @elseif($customer->affiliate_status == 'rejected')
                <div class="text-center"><h4 class="text-danger">Mohon Maaf, Akun anda tidak di terima dalam program afiliasi</h4></div>
                <div class="card mt-4">
                    <p><a href="{{ route('program.affiliate') }}" target="_blank">Baca Syarat dan Ketentuan disini</a></p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <b>Kode Afilliasi</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_code }}" readonly>
                                <span style="color: red; font-size: 13px">harap simpan baik" kode afilliasi anda</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <b>Komisi Afilliasi</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ rupiah($customer->affiliate_commission) }}" readonly>
                            </div>
                            <div class="col-md-12 mt-3">
                                <b>Tanggal Pengajuan</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_date }}" readonly>
                            </div>
                            @if($customer->affiliate_status == 'review')
                                <div class="col-md-12 mt-3">
                                    <b>Tanggal Review</b> <br />
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->date_review }}" readonly>
                                </div>
                            @elseif($customer->affiliate_status == 'rejected')
                                <div class="col-md-12 mt-3">
                                    <b>Tanggal Penolakan</b> <br />
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->date_reject }}" readonly>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @elseif($customer->affiliate_status == 'approved')
                <div class="card mt-4">
                    <p><a href="{{ route('program.affiliate') }}" target="_blank">Baca Syarat dan Ketentuan disini</a></p>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <b>Kode Afilliasi</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_code }}" readonly>
                                <span style="color: red; font-size: 13px">harap simpan baik" kode afilliasi anda</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <b>Komisi Afilliasi</b> <br />
                                @if($customer->affiliate_commission_type == 'flat')
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ rupiah($customer->affiliate_commission) }}" readonly>
                                @else
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_commission }}%" readonly>
                                @endif
                                <span style="color: red; font-size: 13px">komisi yang anda dapatkan pertransaksi menggunakan kode afilliasi anda</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <b>Saldo Afilliasi</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ rupiah($customer->affiliate_balance) }}" readonly>
                                <span style="color: red; font-size: 13px">saldo yang anda dapatkan pertransaksi menggunakan kode afilliasi anda</span>
                            </div>
                            <div class="col-md-12 mt-3">
                                <b>Tanggal Pengajuan</b> <br />
                                <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->affiliate_date }}" readonly>
                            </div>
                            @if($customer->affiliate_status == 'review')
                                <div class="col-md-12 mt-3">
                                    <b>Tanggal Review</b> <br />
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->date_review }}" readonly>
                                </div>
                            @elseif($customer->affiliate_status == 'approved')
                                <div class="col-md-12 mt-3">
                                    <b>Tanggal Persetujuan</b> <br />
                                    <input class="form-control" type="text" name="affiliate_code" value="{{ $customer->date_approve }}" readonly>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <button id="join_affiliate" class="btn btn-success">Bergabung Program Afiliasi</button>
            </div>
            <div class="col-md-12">
                <p><a href="{{ route('program.affiliate') }}" target="_blank">Baca Syarat dan Ketentuan disini</a></p>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#join_affiliate").on('click', function() {
                    Swal.fire({
                        title: "Yakin untuk bergabung di Program Afiliasi?",
                        text: "Anda akan mendapatkan pemberitahuan melalui WhatApp jika telah di setujui bergabung",
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3BB77E',
                        cancelButtonColor: '#a8a8a8',
                        confirmButtonText: 'Iya, yakin!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let timerInterval
                            Swal.fire({
                                title: 'Sedang mengirim permintaan',
                                html: 'Proses ini akan selesai dalam <b></b> detik.',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = (Swal.getTimerLeft() / 1000)
                                            .toFixed(0)
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.href = "{{ route('join.affiliate') }}"
                                }
                            })
                        }
                    })
                })
            });
        </script>
    @endif
@endsection
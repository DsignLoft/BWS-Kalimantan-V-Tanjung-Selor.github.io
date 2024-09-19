@extends('layouts.main')
@section('main')
    <main class="main pages">
        <x-alert />
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > My Account > {{ $title }}
                </div>
            </div>
        </div>
        <div class="page-content pt-70 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content account dashboard-content pl-50">
                                    <div class="tab-pane fade active show" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="mb-0">Antrian Online</h3>
                                            </div>
                                            <div class="card-body contact-from-area">
                                                <p>
                                                    Lebih cepat registrasi dari rumah, sampai outlet tidak perlu telalu lama antri langsung kami layani
                                                </p>
                                                <a href="javascript:;" id="lihat_gambar">Lihat Cara Registrasi</a>
                                                <img src="{{ asset('assets/images/admin/cara_register.jpg') }}" alt="" width="100%" id="gambar_register">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <form class="contact-form-style mt-30 mb-50" action="{{ route('get.queue') }}" method="post">
                                                            @csrf
                                                            <div class="input-style mb-20">
                                                                <label>Pilih Outlet</label>
                                                                <x-select2 class="form-control" name="outlet" required>
                                                                    <option value="">Pilih Outlet</option>
                                                                    @foreach ($outlets as $outlet)
                                                                        <option value="{{ $outlet->warehouse }}">{{ $outlet->name }}</option>
                                                                    @endforeach
                                                                </x-select2>
                                                            </div>
                                                            <div class="input-style mb-20">
                                                                <label>pilih pelayanan</label>
                                                                <x-select2 class="form-control" name="service" required>
                                                                    <option value="">pilih pelayanan</option>
                                                                    <option value="siap_cetak">Siap Cetak</option>
                                                                    <option value="edit_design">Edit Design</option>
                                                                </x-select2>
                                                            </div>
                                                            <button class="submit submit-auto-width" type="submit">Kirim Permintaan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-sm-5">
                        <div>Riwayat Antrian</div>
                        <div class="table-responsive ">
                            <table class="table table-bordered text-sm">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>No. Antrian</th>
                                    <th>Service</th>
                                    <th>ETS ( Estimated Time Service)</th>
                                    <th>Outlet</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($queues as $queue)
                                    <tr class="@if ($loop->first) text-bold @endif">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ dateID2($queue->created_at) }}</td>
                                        <td>{{ $queue->no_antrian }}</td>
                                        <td>{{ $queue->service }}</td>
                                        <td>{{ dateTimeID2($queue->ets) }}</td>
                                        <td>Indoprinting {{ $queue->outlet }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#gambar_register").hide();
            $("#lihat_gambar").on('click', function() {
                $("#gambar_register").slideToggle('fast');
            });
        });
    </script>
@endsection

<div class="modal fade" id="kurirModal" tabindex="-1" role="dialog" aria-labelledby="kurirModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kurirModalTitle"><b>Detail transaksi</b></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-sr-cross"></i>
                </button>
            </div>
            <div class="modal-body">
                @if (isset($kurir->detail->waybill_number))

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Detail Resi  -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Detail pengiriman</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless" style="font-size: 14px">
                                        <tbody>
                                            <tr>
                                                <td width="20%">No. Resi</td>
                                                <td>: {{ $kurir->detail->waybill_number }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Ekspedisi</td>
                                                <td>: {{ $kurir->summary->courier_name }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Nama Kurir</td>
                                                <td>: {{ $kurir->detail->shippper_name }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Alamat Tujuan</td>
                                                <td>: {{ $kurir->detail->receiver_address1 }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Penerima</td>
                                                <td>: {{ $kurir->detail->receiver_name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Status pengiriman  -->
                            {{-- <div class="card my-2">
                                <div class="card-header">
                                    <h5 class="card-title">Status pengiriman</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless" style="font-size: 14px">
                                        <tbody>
                                            <tr>
                                                <td width="20%">Status</td>
                                                <td>: {{ $kurir->status->status }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Penerima</td>
                                                <td>: {{ $kurir->status->pod_receiver }}</td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Waktu</td>
                                                <td>: dateID($kurir->status->pod_date) . ' ' . $kurir->status->pod_time }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-body">
                                    <div id="content">
                                        <ul class="timeline">
                                            @foreach ($kurir->manifest as $tl)
                                                <li class="event">
                                                    <h3>{{ dateID($tl->manifest_date) . ' ' . $tl->manifest_time }}</h3>
                                                    <div style="font-size: 12px">{{ $tl->manifest_description }} Kota {{ $tl->city_name }}</div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @else
                    {{--@if ($kurir->tracking_gosend)--}}
                         {{--<a href="{{ $kurir->tracking_gosend }}" target="_blank">{{ $kurir->tracking_gosend }}</a>--}}
                    {{--@else--}}
                        <div>Pesanan belum dikirim</div>
                    {{--@endif--}}
                @endif
            </div>
        </div>
    </div>
</div>

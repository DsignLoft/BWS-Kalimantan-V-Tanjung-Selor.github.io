<div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaksiModalTitle"><b>Detail transaksi</b></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fi-sr-cross"></i>
                </button>
            </div>
            <div class="modal-body detail-transaksi">
                <table class="table table-bordered">
                    <tr>
                        <td>No. Invoice</td>
                        <td>{{ $sale->no }}</td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td>{{ $sale->payment_status }}</td>
                    </tr>
                    <tr>
                        <td>Batas pembayaran</td>
                        <td>{{ dateTime($sale->payment_due_date) }}</td>
                    </tr>
                    <tr>
                        <td>Grand total</td>
                        <td>{{ rupiah($sale->grand_total) }}</td>
                    </tr>
                    @if ($payment_validation != '')
                        <tr>
                            <td>Kode unik</td>
                            <td style="color: blueviolet">{{ $payment_validation->unique_code }}</td>
                        </tr>
                        <tr>
                            <td>Total pembayaran</td>
                            <td class="font-weight-bold" style="color: orangered"><span id="total_pembayaran">{{ $payment_validation != '' ? rupiah($payment_validation->transfer_amount) : rupiah($sale->grand_total) }}</span><a href="javascript:void(0)" class="fad fa-copy" onclick="copyToClipboard('#total_pembayaran')"></a></td>
                        </tr>
                    @endif
                </table>
                @if (!in_array($sale->payment_status, ['Paid', 'Expired', 'Due']))
                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align:center">No. Rekening</th>
                            <th>Nama Bank</th>
                            <th>Atas Nama</th>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="fad fa-copy" onclick="copyToClipboard('#bri')"></a><span id="bri">0083 01 001092 56 5</span>
                            </td>
                            <td width="20%"><img src="{{ asset('assets/images/logo/logo_bri.png') }}" alt="" class="img-bank"></td>
                            <td>CV. Indoprinting</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="fad fa-copy" onclick="copyToClipboard('#bni')"></a><span id="bni">5592 09008</span>
                            </td>
                            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_bni.png') }}" alt="" class="img-bank"></td>
                            <td>CV. Indoprinting</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="fad fa-copy" onclick="copyToClipboard('#mandiri')"></a><span id="mandiri">1360 0005 5532 3</span>
                            </td>
                            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_mandiri.png') }}" alt="" class="img-bank"></td>
                            <td>CV. Indoprinting</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" class="fad fa-copy" onclick="copyToClipboard('#bca')"></a><span id="bca">8030 200234</span>
                            </td>
                            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_bca.png') }}" alt="" class="img-bank"></td>
                            <td>Anita Ratnasari</td>
                        </tr>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

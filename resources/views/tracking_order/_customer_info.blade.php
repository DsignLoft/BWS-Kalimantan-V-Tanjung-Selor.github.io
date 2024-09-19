<div class="col-md-3 mb-3">
    <div>
        <a href="{{ route('track.order.w2p') }}" class="btn btn-warning mb-2 w-100"><i class="fi-sr-arrow-left"></i> <b>Kembali</b></a>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <strong>Nama lengkap</strong>
            <p class="text-muted">
                {{ $customer->name }}<br>
                {{ $customer->company ?? '' }}
            </p>
            <hr>
            <strong>Nomor telepon</strong>
            <p class="text-muted">
                {{ $customer->phone }}
            </p>
            @if ($order)
                <strong>Catatan untuk pelanggan</strong>
                <p class="text-muted">
                    {{ $order->message }}
                </p>
            @endif
        </div>
    </div>
    @if ($pic)
        <div class="card card-primary mt-2">
            <div class="card-header">
                <h5 class="card-title">Data Indoprinting</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong>Outlet produksi</strong>
                <p class="text-muted">
                    {{ $sale->warehouse }}
                </p>
                <hr>
                @if ($order)
                    <strong>Outlet Pengambilan</strong>
                    <p class="text-muted">
                        {{ $order->pickup }}
                    </p>
                    <hr>
                @endif
                <strong>PIC</strong>
                <p class="text-muted">
                    {{ $pic->name }}<br>
                </p>
            </div>
        </div>
    @endif
</div>

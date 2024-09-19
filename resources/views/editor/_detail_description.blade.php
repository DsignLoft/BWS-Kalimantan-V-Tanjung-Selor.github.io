<div class="tab-style3">
    <ul class="nav nav-tabs text-uppercase">
        <li class="nav-item">
            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Keterangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Informasi Tambahan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Sumber Design</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Ulasan (0)</a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade show active" id="Description">
            <div class="">
                {!! $value->description !!}
            </div>
        </div>
        <div class="tab-pane fade" id="Additional-info">
            <div class="row">
                <div class="col-md-3" id="table-range"></div>
            </div>
            <div class="row">
                <h3>Belum ada Informasi Tambahan</h3>
            </div>
        </div>
        <div class="tab-pane fade" id="Vendor-info">
            <ul>
                <li>Jenis file: TIFF, JPG, PNG, PDF, ZIP, RAR.</li>
                <li>Ukuran File Upload maksimal 20 Mb, lebih dari 20 Mb menggunakan share link.</li>
                <li>Mohon dicek detail: design, text, ejaan, warna, background, informasi, batas margin.</li>
                <li>Mohon file yang anda kirim sudah Ready to print, file yang belum siap akan mempengaruhi waktu produksi.</li>
                <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 dan anda pilih ukuran 2x1 maka akan kita tarik di ukuran 2x1</li>
                <li>Setiap file yang dicetak sudah dicek terlebih dahulu sesuai keterangan yang di order</li>
                <li>Mohon file yang anda kirim rasio ukurannya sesuai dengan cetakan, misalnya file 1x1 di cetak menjadi 1x1 bukan 1x2</li>
                <li>Setiap file yang dicetak akan melalui pengecekan kembali untuk memastikan hasil yang maksimal</li>
            </ul>
        </div>
        <div class="tab-pane fade" id="Reviews">
            <!--Comments-->
            <h3>Belum ada Ulasan</h3>
        </div>
    </div>
</div>

@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > {{ $title }}
                </div>
            </div>
        </div>
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="text-left mb-50">
                            <h2 class="title style-3 mb-40 text-center">Frequently Asked Questions</h2>
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#cara-order" type="button" role="tab" aria-controls="cara-order" aria-selected="true">Pesanan di Website dan Aplikasi Kami</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#ketentuan-file" type="button" role="tab" aria-controls="ketentuan-file" aria-selected="false">Ketentuan File</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#setelah-order" type="button" role="tab" aria-controls="setelah-order" aria-selected="false">Setelah Order</button>
                                        </li>
                                    </ul>

                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="cara-order" role="tabpanel" aria-labelledby="cara-order-tab">
                                            <ol>
                                                <li>Bagaimana Cara Memesan</li>
                                                Untuk melakukan pesanan/order, anda dapat:
                                                <ul>
                                                    <li>Masuk ke halaman www.indoprinting.co.id </li>
                                                    <li>Memilih produk yang dinginkan dengan cara melakukan pencarian dari navigasi,
                                                        search ataupun produk pilihan </li>
                                                    <li>Memilih Spesifikasi yang diinginkan </li>
                                                    <li>Memasukan pesanan Anda dalam keranjang </li>
                                                    <li>Mengupload File siap cetak anda </li>
                                                    <li>Memilih metode pengiriman </li>
                                                    <li>Memilih Metode pembayaran </li>
                                                    <li>Melakukan Transfer sesuai code unik </li>
                                                    <li>Cek Status Pesanan Anda di my profil </li>
                                                </ul>
                                                <li>Berapa lama proses order di Web indoprinting.co.id ?</li>
                                                Untuk Proses Order tergantung kesiapan File anda Jika tidak ada masalah kami akan proses
                                                dalam hitungan Jam dan selesai dihari yang sama . Jumlah juga menentukan lamanya proses
                                                produksi .
                                                <li>Bagaimana cara memesan banyak produk yang berbeda-beda ?</li>
                                                Untuk saat ini, Anda bisa memesan produk yang berbeda-beda dengan mengupload file di
                                                halaman produk yang diinginkan secara satu per satu.
                                                <li>Bagaimana cara saya mengkonfirmasi pembayaran ?</li>
                                                Upload bukti pembayaran saat selesai transaksi. Jika anda terkendala dalam pemenuhan
                                                code unik.
                                                <li>Bagaimana cara saya membatalkan atau mengganti pesanan?</li>
                                                Pesanan bisa dibatalkan sebelum payment bila sudah melakukan payment file akan kami
                                                cetak sesuai dengan pesanan sebelumnya dan tidak bisa di rubah / cancel.
                                                <li>Jika saya mendapat produk yang rusak, apa yang bisa saya lakukan ?</li>
                                                Kami memiliki kebijakan 100% jaminan kepuasan. Jika Anda menerima produk yang rusak
                                                (sesuai Syarat dan Ketentuan) maka Anda bisa menghubungi kami, mengirimkan barang
                                                tersebut kembali, dan kami akan mencetak ulang order tersebut.
                                                <li>Bagaimana jika saya ingin mencetak tapi belum memiliki desain ?</li>
                                                Untuk sementara desain lewat web belum kami aktifkan. Jadi solusi kami kaka bisa
                                                kunjungi outlet indoprinting terdekat kalian
                                                <li>Pertanyaan dan pemesanan untuk produk yang belum tersedia pada website dapat
                                                    dilakukan dengan:</li>
                                                Mengirimkan email ke online@indoprinting.co.id Disarankan menyertakan spesifikasi
                                                lengkap (apabila ada) untuk memudahkan team kami memberikan informasi dan melakukan
                                                penawaran harga.
                                            </ol>
                                        </div>
                                        <div class="tab-pane fade" id="ketentuan-file" role="tabpanel" aria-labelledby="ketentuan-file-tab">
                                            <ol>
                                                <li>Berapa resolusi file yang dianjurkan untuk diupload ?</li>
                                                Agar file tidak pecah saat di-print, kami menganjurkan Anda mengirimkan resolusi file di
                                                atas 300dpi.
                                                <li>Berapa resolusi file yang dianjurkan untuk diupload ?</li>
                                                Anda bisa mengecek kualitas cetakan dengan:
                                                <ul>
                                                    <li>Untuk File Photoshop atau JPEG buka di Program Photoshop lalu Klik Image > Image
                                                        Size. Maka akan keluar kotak dialog Image Size. Pastikan resolusinya sudah 300
                                                        pixel/inch.</li>
                                                    <li>Perbesar File JPEG anda dalam Program Photoshop dengan Zoom in hingga 150% jika
                                                        kualitas tidak pecah berarti tidak masalah.
                                                    </li>
                                                </ul>
                                                <li>Bisakah saya mengirimkan file yang sangat besar ?</li>
                                                Maksimal file 10 mb, jika jika lebih dari itu bisa kirimkan capture pren screen saja
                                                tapi file yg besar bisa dikirimkan ke email kami online@indoprinting.co.id
                                                <li>4. Mode warna apa yang dianjurkan untuk diupload ?</li>
                                                Kami menerima mode warna CMYK.
                                            </ol>
                                        </div>
                                        <div class="tab-pane fade" id="setelah-order" role="tabpanel" aria-labelledby="setelah-order-tab">
                                            <ol>
                                                <li>Bagaimana cara mengetahui status pesanan saya ?</li>
                                                Anda bisa mengecek status pesanan melalui website resmi kami <a
                                                        href="/">www.indoprinting.co.id</a>. Berikut langkah-langkah yang bisa dilakukan:
                                                <ul>
                                                    <li>Lakukan login ke <a href="/">www.indoprinting.co.id</a></li>
                                                    <li>Ada bagian kanan atas layar klik <b>Nama Pelanggan</b> </li>
                                                    <li>Cek di Daftar transaksi</li>
                                                </ul>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
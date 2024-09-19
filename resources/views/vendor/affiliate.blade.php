@extends('layouts.main')
@section('main')
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Daftar > Reseller
                </div>
            </div>
        </div>
        <x-alert />
        <div class="page-content pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mx-auto text-center">
                        <h1 class="title heading-1 style-3 mb-40">Bergabung bersama <span class="text-brand">Indoprinting</span> di Program Affiliate </h1>
                        <p class="font-xl mb-80">Beli produk Indoprinting menggunakan kode affiliasi anda untuk mendapatkan komisi dan penghasilan tambahan</p>
                    </div>
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="text-center mb-50">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-1.svg" alt="Program Affiliate Indoprinting Semarang" />
                                        <h4>Diskon Berlimpah</h4>
                                        <p>Dapatkan diskon berlimpah dengan bergabung program affiliasi, selain anda mendapatkan komisi, anda juga mendapatkan potongan harga.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-2.svg" alt="Program Affiliate Indoprinting Semarang" />
                                        <h4>Komisi Besar</h4>
                                        <p>Indoprinting sudah menentukan dan menguji komisi yang akan di dapatkan oleh para affiliator yang telah bergabung.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-3.svg" alt="Program Affiliate Indoprinting Semarang" />
                                        <h4>Withdrawal Mudah</h4>
                                        <p>Penarikan komisi affiliasi sangat lah mudah, dengan minimal nominal Rp 50.000,- dan dengan berbagai metode penarikan.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-8 col-lg-12 mx-auto">
                        <div class="single-content mb-50">
                            <h3>1. Syarat untuk bergabung</h3>
                            <ul class="mb-30">
                                <li>Calon affiliator harus mendaftar ke program afiliasi yang disediakan oleh indoprinting.</li>
                                <li>Calon affiliator harus memiliki akun di website indoprinting.</li>
                            </ul>
                            <h3>2. Tata cara pendaftaran</h3>
                            <ul class="mb-30">
                                <li>Calon affiliator dapat mendaftar ke program afiliasi hanya dengan menekan satu tombol.</li>
                                <li>Calon affiliator akan diberikan kode afiliasi yang dapat digunakan untuk mempromosikan produk atau layanan yang ditawarkan oleh indoprinting.</li>
                            </ul>
                            <h3>3. Ketentuan komisi</h3>
                            <ul class="mb-30">
                                <li>Komisi akan diberikan kepada affiliator atas jumlah order yang berhasil dihasilkan melalui kode afiliasi mereka.</li>
                                <li>Besar komisi akan ditentukan oleh indoprinting dan dapat berbeda-beda tergantung pada jenis produk atau layanan yang dijual.</li>
                                <li>Komisi akan diberikan setelah transaksi selesai dan pembayaran dilakukan oleh konsumen yang menggunakan kode afiliasi affiliator.</li>
                            </ul>
                            <h3>4. Tata cara promosi</h3>
                            <ul class="mb-30">
                                <li>Affiliator harus menggunakan kode afiliasi yang diberikan oleh indoprinting untuk mempromosikan produk atau layanan yang ditawarkan.</li>
                                <li>Affiliator dapat mempromosikan produk atau layanan melalui media sosial, email marketing, atau metode promosi lain yang dianggap sesuai.</li>
                                <li>Affiliator tidak diperbolehkan untuk menggunakan teknik spamming atau metode promosi yang dianggap tidak etis.</li>
                                <li>Customer menggunakan kode afiliasi untuk melakukan transaksi.</li>
                            </ul>
                            <h3>5. Pembayaran komisi</h3>
                            <ul class="mb-30">
                                <li>Komisi akan otomatis masuk ke Saldo Afilliasi dan akan di ubah ke IDP Pay setiap bulannya, sehingga bisa di lakukan penarikan</li>
                                <li>Besar nilai komisi akan di tentukan oleh indoprinting, sesuai dengan kebijakan yang telah ditetapkan oleh indoprinting.</li>
                                <li>Indoprinting berhak menunda atau menolak pembayaran komisi jika terdapat pelanggaran atau ketidakpatuhan dari affiliator terhadap peraturan dan kebijakan yang telah ditetapkan.</li>
                            </ul>
                            <h3 class="mt-30">6. Workflow</h3>
                            <ul class="mb-30">
                                <li>Calon affiliator mendaftar ke program afiliasi melalui dashboard akun indoprinting.</li>
                                <li>Setelah mendaftar, affiliator akan diberikan kode afiliasi yang dapat digunakan untuk mempromosikan produk atau layanan yang ditawarkan oleh indoprinting.</li>
                                <li>Affiliator mempromosikan produk atau layanan melalui kode afiliasi mereka.</li>
                                <li>Jika terdapat konsumen yang melakukan order menggunakan kode afiliasi affiliator, maka affiliator akan berhak mendapatkan komisi atas order tersebut.</li>
                                <li>Indoprinting akan memproses pembayaran komisi secara reguler sesuai dengan kebijakan yang ditetapkan.</li>
                            </ul>
                        </div>
                        <div class="contact-from-area padding-20-row-col mb-80">
                            <h5 class="text-brand mb-10">Formulir Pendaftaran</h5>
                            <h2 class="mb-10">Pendaftaran Program Affiliate</h2>
                            <p class="text-muted mb-30 font-sm">masuk ke akun indoprinting anda untuk melakukan permintaan bergabung</p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    @auth
                                        <a class="btn btn-primary" href="{{ route('customer.affiliate') }}">Daftar Program Afilliasi</a>
                                    @endauth
                                    @guest
                                        <a class="btn btn-primary" href="{{ route('login') }}">Masuk / Daftar Akun</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
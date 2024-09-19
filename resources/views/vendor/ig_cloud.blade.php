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
                        <h1 class="title heading-1 style-3 mb-40">Dapatkan Akses Unlimited Cloud Storage <span class="text-brand">Indoprinting</span> di iGCloud </h1>
                        <p class="font-xl mb-80">Hanya dengan mendaftar akun di website indoprinting, anda bisa mendapatkan Unlimited Cloud Storage seperti Google Drive, GRATIS</p>
                    </div>
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="text-center mb-50">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/unlimited-storage.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>Unlimited Storage</h4>
                                        <p>Pengguna dapat dengan mudah menyimpan, mengedit, dan berbagi file tanpa harus khawatir tentang kapasitas penyimpanan yang terbatas.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/fast-upload.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>Fast Upload</h4>
                                        <p>Membantu meningkatkan produktivitas pengguna serta memastikan pengguna dapat mengakses file dengan cepat.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/share-anywhere.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>Share Anywhere</h4>
                                        <p>Memungkinkan untuk berbagi file dengan cepat dan efisien, serta memastikan pengguna mengelola akses file secara aman.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/multiple-uploads.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>Multiple Uploads</h4>
                                        <p>Memungkinkan untuk mengunggah file atau folder dalam jumlah besar dengan mudah dan cepat, dan akan menghemat waktu.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/file-manager.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>File Manager</h4>
                                        <p>Memungkinkan untuk mengatur dan mengelola file atau folder yang tersimpan di akun penyimpanan dengan lebih mudah dan efisien.</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://cloud.infogotalent.com/images/indoprinting/file-encryption.png" alt="iGCloud by InfoGoTalent" />
                                        <h4>File Encryption</h4>
                                        <p>Memungkinkan untuk mengamankan file atau folder yang tersimpan di akun penyimpanan awan dengan teknologi enkripsi yang kuat.</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-8 col-lg-12 mx-auto">
                        <div class="contact-from-area padding-20-row-col mb-80">
                            <h5 class="text-brand mb-10">Permintaan Akses</h5>
                            <h2 class="mb-10">Permintaan Akses iGCloud</h2>
                            <p class="text-muted mb-30 font-sm">masuk ke akun indoprinting anda untuk melakukan permintaan akses iGCloud</p>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    @auth
                                        <a class="btn btn-primary" href="{{ route('profile') }}">Permintaan Akses iGCloud</a>
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
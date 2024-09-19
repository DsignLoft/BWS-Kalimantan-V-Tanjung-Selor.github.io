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
                        <h1 class="title heading-1 style-3 mb-40">Memulai bisnis ritel online dengan <span class="text-brand">Indoprinting</span> hari ini</h1>
                        <p class="font-xl mb-80">Jual produk Anda dan terima pembayaran kartu kredit dari pelanggan yang membeli. Indoprinting memberi Anda semua yang Anda butuhkan untuk menjalankan toko online yang sukses.</p>
                    </div>
                    <div class="col-xl-10 col-lg-12 m-auto">
                        <section class="text-center mb-50">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-1.svg" alt="" />
                                        <h4>Harga & Penawaran Terbaik</h4>
                                        <p>Ada banyak variasi bagian Lorem Ipsum yang tersedia, tetapi sebagian besar telah mengalami perubahan dalam beberapa bentuk</p>
                                        <a href="#">Baca lebih banyak</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-2.svg" alt="" />
                                        <h4>Beraneka ragam</h4>
                                        <p>Ada banyak variasi bagian Lorem Ipsum yang tersedia, tetapi sebagian besar telah mengalami perubahan dalam beberapa bentuk</p>
                                        <a href="#">Baca lebih banyak</a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-24">
                                    <div class="featured-card">
                                        <img src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/theme/icons/icon-3.svg" alt="" />
                                        <h4>Pengiriman gratis</h4>
                                        <p>Ada banyak variasi bagian Lorem Ipsum yang tersedia, tetapi sebagian besar telah mengalami perubahan dalam beberapa bentuk</p>
                                        <a href="#">Baca lebih banyak</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-xl-8 col-lg-12 mx-auto">
                        <div class="single-content mb-50">
                            <h3>1. Pendaftaran Akun</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla modi dolores neque omnis ipsa? Quia, nam voluptas! Aut, magnam molestias:</p>
                            <ul class="mb-30">
                                <li>Nama (wajib)</li>
                                <li>Usia (wajib)</li>
                                <li>Tanggal lahir (wajib)</li>
                                <li>Paspor/ no.ID (yg dibutuhkan)</li>
                                <li>Karier saat ini (wajib)</li>
                                <li>Nomor ponsel (wajib)</li>
                                <li>Alamat Email: (Dibutuhkan)</li>
                                <li>Hobi &amp; minat (opsional)</li>
                                <li>Profil sosial (opsional)</li>
                            </ul>
                            <h3>2. Pilih paket</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia necessitatibus repellat placeat aut enim recusandae assumenda adipisci quisquam, deserunt iure veritatis cupiditate modi aspernatur accusantium, mollitia doloribus. Velit, iste.</p>
                            <h3>3. Tambahkan produk Anda</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ut autem sed! Assumenda, nostrum non doloribus tenetur, pariatur veritatis harum natus ipsam maiores dolorem repudiandae laboriosam, cupiditate odio earum eum?</p>
                            <h3>4. Mulailah berjualan</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nesciunt nam aut magnam libero aspernatur eaque praesentium? Tempore labore quis neque? Magni.</p>
                            <h3>5. Kartu Kredit yang Diterima</h3>
                            <ul>
                                <li>Visa</li>
                                <li>Mastercards</li>
                                <li>American Express</li>
                                <li>Discover</li>
                            </ul>
                            <span>*Pajak dihitung oleh bank lokal dan lokasi Anda.</span>
                            <h3 class="mt-30">6. Dapatkan uang</h3>
                            <ul>
                                <li>Konten yang diperbarui secara teratur</li>
                                <li>Aman &amp; pembayaran tanpa kerumitan</li>
                                <li>Pembayaran 1-klik</li>
                                <li>Akses &amp; dasbor pengguna cerdas</li>
                            </ul>
                        </div>
                        <div class="contact-from-area padding-20-row-col mb-80">
                            <h5 class="text-brand mb-10">Formulir Pendaftaran</h5>
                            <h2 class="mb-10">Pendaftaran Reseller</h2>
                            <p class="text-muted mb-30 font-sm">Isi formulir di bawah ini untuk mengirim permintaan bergabung</p>
                            <form class="contact-form-style mt-30" id="contact-form" action="{{ route('registerreseller.act') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input name="is_customer" type="hidden" value="{!! Auth()->user()->id_customer ?? '0' !!}" />
                                <div class="row">
                                    <p class="mt-2">Data Diri</p><hr />
                                    <div class="col-lg-12 col-md-12">
                                        <div class="input-style mb-20">
                                            <input name="reseller_name" placeholder="Nama Lengkap*" type="text" value="{!! Auth()->user()->name ?? '' !!}" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="reseller_email" placeholder="Alamat Email*" type="email" value="{!! Auth()->user()->email ?? '' !!}" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="reseller_phone" placeholder="No. Telp*" type="number" value="{!! Auth()->user()->phone ?? '' !!}" required />
                                        </div>
                                    </div>

                                    <p class="mt-2">Document</p><hr />

                                    <div class="col-lg-12 col-md-12">
                                        <label>Foto Diri</label>
                                        <div class="input-style mb-20">
                                            <input name="reseller_document_imagebody" placeholder="Foto Wajah" type="file" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label>Foto ID Card / KTP</label>
                                        <div class="input-style mb-20">
                                            <input name="reseller_document_imageidcard" placeholder="Foto KTP" type="file" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <label>Foto Diri Memegang ID Card / KTP</label>
                                        <div class="input-style mb-20">
                                            <input name="reseller_document_imagefull" placeholder="Foto Diri Memegang KTP" type="file" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button class="submit submit-auto-width" type="submit">Kirim Permintaan Pendaftaran</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
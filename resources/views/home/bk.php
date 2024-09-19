@extends('layouts.main')
@section('main')
<style>
    body {
	 margin-top: 30px;
	 background-color: #eee;
}
 .faq-nav {
	 flex-direction: column;
	 margin: 0 0 32px;
	 border-radius: 2px;
	 border: 1px solid #ddd;
	 box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
 .faq-nav .nav-link {
	 position: relative;
	 display: block;
	 margin: 0;
	 padding: 13px 16px;
	 background-color: #fff;
	 border: 0;
	 border-bottom: 1px solid #ddd;
	 border-radius: 0;
	 color: #616161;
	 transition: background-color 0.2s ease;
}
 .faq-nav .nav-link:hover {
	 background-color: #f6f6f6;
}
 .faq-nav .nav-link.active {
	 background-color: #f6f6f6;
	 font-weight: 700;
	 color: rgba(0, 0, 0, .87);
}
 .faq-nav .nav-link:last-of-type {
	 border-bottom-left-radius: 2px;
	 border-bottom-right-radius: 2px;
	 border-bottom: 0;
}
 .faq-nav .nav-link i.mdi {
	 margin-right: 5px;
	 font-size: 18px;
	 position: relative;
}
 .tab-content {
	 box-shadow: 0 1px 5px rgba(85, 85, 85, 0.15);
}
 .tab-content .card {
	 border-radius: 0;
}
 .tab-content .card-header {
	 padding: 15px 16px;
	 border-radius: 0;
	 background-color: #f6f6f6;
}
 .tab-content .card-header h5 {
	 margin: 0;
}
 .tab-content .card-header h5 button {
	 display: block;
	 width: 100%;
	 padding: 0;
	 border: 0;
	 font-weight: 700;
	 color: rgba(0, 0, 0, .87);
	 text-align: left;
	 white-space: normal;
}
 .tab-content .card-header h5 button:hover, .tab-content .card-header h5 button:focus, .tab-content .card-header h5 button:active, .tab-content .card-header h5 button:hover:active {
	 text-decoration: none;
}
 .tab-content .card-body p {
	 color: #616161;
}
 .tab-content .card-body p:last-of-type {
	 margin: 0;
}
 .accordion > .card:not(:first-child) {
	 border-top: 0;
}
 .collapse.show .card-body {
	 border-bottom: 1px solid rgba(0, 0, 0, .125);
}
 
</style>
<div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md-10">
                    <div class="breadcumb-text">
                        <!--<h5>Beranda -> Berita SDA</h5>-->
                        <h2>{{ $title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="get-it mb-2">
    <div class="row">
        <div class="col-lg-4">
            <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1" aria-selected="true">
                    <i class="mdi mdi-help-circle"></i> Persyaratan
                </a>
                <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2" aria-selected="false">
                    <i class="mdi mdi-account"></i> Sistem, Mekanisme dan Prosedur
                </a>
                <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3" aria-selected="false">
                    <i class="mdi mdi-account-settings"></i> Waktu Penyelesaian
                </a>
                <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4" aria-selected="false">
                    <i class="mdi mdi-heart"></i> Biaya/Tarif
                </a>
                <a href="#tab5" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab5" aria-selected="false">
                    <i class="mdi mdi-coin"></i> Produk Pelayanan
                </a>
                <a href="#tab6" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab6" aria-selected="false">
                    <i class="mdi mdi-help"></i> Pengaduan Pelayanan
                </a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="tab-content" id="faq-tab-content">
                <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                    <div class="accordion" id="accordion-tab-1">
                        <div class="card">
                            <h1>Persyaratan</h1>
                            <p>
                                Persyaratan izin pengusahaan Sumber Daya Alam (SDA) mengacu pada Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat (PUPR) Nomor 01/PRT/M/2016.<br><br>
⦁	Surat permohonan dari pemohon sesuai dengan Permen PUPR No.01/PRT/M/2016<br>
⦁	Peta lokasi / peta detail lokasi berskala dilengkapi dengan koordinat titik pengambilan<br>
⦁	Gambar / detail design konstruksi bangunan beserta layout (pengambil – proses – pembuangan) dan bangunan / sarana pendukung lainnya<br>
⦁	Spesifikasi teknis bangunan konstruksi dan/atau alat pendukung lainnya<br>
⦁	Proposal teknik/ penjelasan pengusahaan sumber daya air<br>
⦁	Neraca air pengusahaan daya air yang akan dilakukan<br>
⦁	Rencana operasi dan pemeliharaan pada sumber air<br>
⦁	Bukti kepemilikan atau pengusahaan lahan (sertifikat)<br>
⦁	Izin lingkungan serta Dokumen lingkungan :<br>
⦁	Amdal / UKL – UPL<br>
⦁	SPPL / Dsb<br>
⦁	Surat izin pembuangan limbah cair (IPLC)<br>
⦁	Profil Pemohon dan Profil Perusahaan/Instansi<br>
⦁	FC KTP pemohon;<br>
⦁	Akta pendirian perusahaan beserta akta perubahan;<br>
⦁	NPWP perusahaan / instansi;<br>
⦁	NIB<br>
⦁	TDP,SIUP,SITU;<br>
⦁	Surat keterangan, dll<br>
⦁	Berita acara pertemuan konsultasi masyarakat (PKM)<br>
⦁	Keterangan lainnya<br>
⦁	Pajak Pengambilan dan pemanfaatan air permukaan (1 tahun terakhir)<br>
⦁	Laporan pemakaian air berdasarkan pencatatan flowmeter (1 tahun terakhir)<br>
⦁	Hasil Uji Labor kualitas air Limbah (1 tahun terakhir)<br>
⦁	PTJM (Surat Pertanggung Jawaban Mutlak)<br>
⦁	Histori pendirian dan pengoperasian perusahaan

                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                    <div class="accordion" id="accordion-tab-2">
                        <div class="card">
                            <h1>Sistem, Mekanisme, dan Prosedur</h1>
                            <p>
                                Sistem, mekanisme, dan prosedur untuk pengajuan Permohonan Rekomendasi Teknis (Rekomtek) dalam rangka mendapatkan Izin Pengusahaan SDA dijelaskan sebagai berikut:<br><br>
⦁	Permohonan rekomtek diajukan kepada Kepala BBWS/BWS, melalui Tim Rekomtek beserta dengan kelengkapan dokumen.<br>
⦁	Tim Rekomtek melakukan pengecekan kelengkapan persyaratan, jika persyaratan tidak lengkap dokumen dikembalikan.<br>
⦁	Tim Rekomtek BBWS/BWS melakukan verifikasi data teknis, jika tidak Lolos verifikasi dokumen dikembalikan.<br>
⦁	Pemohon melakukan expose di BBWS/BWS dan Tim Rekomtek membuat Berita Acara Expose.<br>
⦁	Tim Rekomtek Peninjauan Lapangan dan membuat Berita Acara Peninjauan Lapangan (jika diperlukan).<br>
⦁	Tim Rekomtek menyusun draft Rekomtek beserta Berita Acara Penyusunan Rekomtek.<br>
⦁	Rekomtek di Tanda Tangani Oleh Kepala BBWS/BWS.<br>
⦁	Surat Rekomtek diserahkan kepada Pemohon, Surat rekomtek berlaku hanya 60 hari kalenderdari terbitnya rekomtek.<br>
⦁	Pemohon mengajukan permohonan izin ke Menteri Cq Dirjen SDA melaui UPP dgn disertai Rekomtek dan Kelengkapan lainnya.<br><br>
Catatan : Jika berkas tidak lengkap atau tidak lulus verifikasi maka berkas dikembalikan ke Pemohon. Dan proses kembali dari awal.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                    <div class="accordion" id="accordion-tab-3">
                        <div class="card">
                            <h1>Waktu Penyelesaian</h1>
                            <p>
                                Rekomendasi Teknis dikeluarkan dalam waktu paling lama 23 (dua puluh tiga) hari kerja terhitung sejak permohonan rekomendasi teknis untuk pengusahaan sumber daya air beserta persyaratannya diterima secara lengkap. Sementara itu, untuk proses perizinan memerlukan waktu 7 (tujuh) hari kerja.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                    <div class="accordion" id="accordion-tab-4">
                        <div class="card">
                            <h1>Biaya/Tarif</h1>
                            <p>Tidak Dipungut Biaya/Gratis</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab5" role="tabpanel" aria-labelledby="tab5">
                    <div class="accordion" id="accordion-tab-5">
                        <div class="card">
                            <h1>Produk Pelayanan</h1>
                            <p>Rekomendasi Teknis dan Perizinan</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab6" role="tabpanel" aria-labelledby="tab6">
                    <div class="accordion" id="accordion-tab-6">
                        <div class="card">
                            <h1>Pengaduan Pelayanan</h1>
                            <p>
                                Pelayanan pengaduan diterima oleh Petugas Pelayanan Terpadu dapat dilakukan dengan cara sebagai berikut:<br><br>
⦁	Secara langsung (on the spot) di Kantor Balai Wilayah Sungai Kalimantan V  beralamat di Jl. Bhayangkara No. 59 D RT. 66, Karang Anyar, Tarakan Barat, Kalimantan Utara 77111<br>
⦁	Secara online melalui Website Pelayanan Terpadu SID-TERAP (Sistim Informasi Data Terpadu Cepat dan Akurat) dengan mengakses disini

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
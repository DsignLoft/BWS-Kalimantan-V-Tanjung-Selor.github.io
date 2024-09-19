@extends('layouts.main')
@section('main')
    <link rel="stylesheet" href="https://padamaran.bwssumvi.com/assets/frontend/css/style_1.css">
    <div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner1.jpg);">
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
    <div class="get-it">
        <div class="row">

            <div class="container">
                <div class="col-12 col-lg-2 float-left">
                    <h5>Kilas Pengumuman :</h5>
                </div> 
                <div class="col-12 col-lg-10 float-right">
                        
                    <div id="pengumuman" class="carousel carousel-pe slide " data-ride="carousel" >
                        <div class="carousel-inner carousel-inner-pe" >
                            @foreach($informations as $info)
                                 <div class="carousel-item active">
                                    <div class="carousel-caption carousel-caption-pe" >
                                        <a href="#">{{ $info->info_title }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#pengumuman" role="button" data-slide="prev"  >
                            <span class="fa fa-chevron-left" aria-hidden="true" style="padding-top: 15px;"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#pengumuman" role="button" data-slide="next" >
                            <span class="fa fa-chevron-right" aria-hidden="true" style="padding-top: 15px;"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ======= Formulir Pengaduan Section ======= -->
    <div id="container" class="form-pengaduan">
      <!-- Bagian header formulir -->
      <div id="body_header">
        <h2><strong>Formulir </strong>
          <small class="text-body-secondary">Pengaduan dan Aspirasi</small>
        </h2>
        <small>Silakan sampaikan laporan Anda melalui formulir di bawah ini.</small>
      </div>

      <!-- Bagian formulir -->
      <div class="row">
        <form id="formPengaduan" enctype="multipart/form-data" novalidate>
          <div class="col-md-12 mx-auto">
            <!-- Nama -->
            <div class="form-pengaduan">
              <label for="formGroupExampleInput" class="form-label">Nama <span class="text-danger">*</span></label>
              <input type="text" name="name" placeholder="Nama" required>
            </div>

            <!-- No. KTP -->
            <div class="form-pengaduan">
              <label for="formGroupExampleInput" class="form-label">No. KTP <span class="text-danger">*</span></label>
              <input type="text" name="ktp" placeholder="No. KTP" required pattern="[0-9]{16}"
                title="Format KTP harus terdiri dari 16 digit angka">
            </div>

            <!-- Email -->
            <div class="form-pengaduan">
              <label for="formGroupExampleInput" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" placeholder="Email" required
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Format email tidak valid">
            </div>

            <!-- No. Whatsapp -->
            <div class="form-pengaduan">
              <label for="formGroupExampleInput" class="form-label">No. Whatsapp <span
                  class="text-danger">*</span></label>
              <input type="text" name="phone" placeholder="Masukan nomor whatsapp Anda" required>
            </div>

            <!-- Kategori Laporan -->
            <div class="form-pengaduan">
              <label for="pilihtopik" class="form-label">Pilih Kategori Laporan Anda <span
                  class="text-danger">*</span></label>
              <select id="pilihtopik" name="pilihtopik" required="">
                <option value="" disabled selected>-- Pilih Topik --</option>
                <option value="Pengaduan">Pengaduan</option>
                <option value="Aspirasi">Aspirasi</option>
                <option value="Saran">Saran</option>
                <option value="Keluhan">Keluhan</option>
                <option value="Pertanyaan Lain">Topik Lainnya</option>
              </select>
            </div>

            <!-- Deskripsi -->
            <div class="form-pengaduan">
              <label for="formGroupExampleInput" class="form-label">Deskripsi <span class="text-danger">*</span></label>
              <textarea name="message" rows="6" placeholder="Deskripsikan permasalahan yang akan Anda laporkan"
                required></textarea>
              <p style="text-align: justify;" class="form-text text-muted">
                Masukkan detail uraian pertanyaan/keluhan/pengaduan Anda.
                Anda wajib mengunggah lampiran bukti atau informasi yang
                mendukung aduan Anda dengan melampirkan 1 file dengan ukuran
                file yaitu 2 MB dengan tipe file docx, pdf, xlsx, dan jpg.
                Apabila lampiran bukti atau informasi yang mendukung aduan
                Anda memiliki ukuran file lebih dari 2 MB, Anda dapat
                melampirkan tautan pada kolom uraian
                (contoh:https://drive.google.com/drive/ABC)
              </p>
            </div>

            <!-- Lampiran Pendukung -->
            <div class="form-pengaduan">
              <div class="upload">
                <label for="foto" class="form-label">Unggah lampiran pendukung laporan Anda <span
                    class="text-danger">**</span></label>
                <input type="file" id="foto" name="foto" accept="image/*" required onchange="validateFileUpload(this)">
              </div>
            </div><br>

            <!-- Keterangan -->
            <small><strong>Keterangan:</strong></small><br>
            <small><span class="text-danger">*</span>) Wajib diisi</small><br>
            <small><span class="text-danger">**</span>) Tipe dokumen yang dapat diunggah: jpeg, jpg, png, pdf.
              Ukuran dokumen yang dapat diunggah maksimal 2MB.</small>
            <hr>

            <!-- Status dan Tombol -->
            <div hidden id="status"></div>
            <div hidden id="error-message" class="alert alert-danger mt-3"></div>
            <div hidden id="success-message" class="alert alert-success mt-3"></div>
            <!-- Perhatian -->
            <small><strong>PERHATIAN :</strong></small><br>
            <small><span>Sebelum mengirim pengaduan ini, mohon diingat bahwa hanya pengaduan yang memenuhi kriteria yang
                akan diproses lebih lanjut, dan kami mengharapkan keseriusan pengaduan dengan melampirkan data pendukung
                yang memadai.</span></small>
            <hr>
            <div style="display: grid;">
              <!-- Tombol Kirim -->
              <button class="btn btn-danger btn-lg px-5 " style="place-self: end;" id="btnadd" name="submit">Kirim
                laporan</button>
              <!-- Tombol Batal
                                                <button class="btn btn-secondary btn-lg" id="btncancel" name="cancel" data-bs-dismiss="modal">Batal <i class='bx bx-x'></i></button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- ======= End Pengaduan Section ======= -->

@endsection
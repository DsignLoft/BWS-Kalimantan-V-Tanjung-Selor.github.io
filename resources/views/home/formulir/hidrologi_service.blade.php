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
    
    <!-- ======= Form Permintaan Data ======= -->
    <div id="container" class="form-permohonan">
      <!--This is a division tag for body container-->
      <div id="body_header">
        <!--This is a division tag for body header-->
        <h2><strong>Formulir </strong>
          <small class="text-body-secondary">Permohonan Informasi Publik</small>
        </h2>
        <small>Mohon mengisi data permohonan pada E-formulir pengajuan data/informasi
          ini.</small>
      </div>

      <form id="formRequest" enctype="multipart/form-data" novalidate>
        <fieldset>
          <legend><span class="number">1</span>Identitas Pemohon</legend>

          <div class="form-permohonan">
            <label for="namalengkap">Nama <span class="text-danger">*</span></label>
            <input type="text" name="namalengkap" id="namalengkap" placeholder="Masukkan nama lengkap Anda" value="">
          </div>

          <div class="form-permohonan">
            <label for="ktp">Nomor e-KTP <span class="text-danger">*</span></label>
            <input type="text" name="noktp" required id="noktp" placeholder="Masukkan nomor e-KTP Anda" value="">
          </div>

          <div class="form-permohonan">
            <label for="whatsapp">No. WhatsApp <span class="text-danger">*</span></label>
            <input type="text" name="telepon" required id="telepon" placeholder="Silakan masukkan nomor WhatsApp Anda"
              value="">
          </div>

          <div class="form-permohonan">
            <label for="email">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" required id="email" placeholder="Masukkan alamat email Anda" value="">
          </div>

          <div class="form-permohonan">
            <label for="alamat">Alamat <span class="text-danger">*</span></label>
            <textarea name="alamat" required id="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda"></textarea>
          </div>

          <div class="form-permohonan">
            <label for="kota/kab">Kota/Kabupaten <span class="text-danger">*</span></label>
            <input type="text" name="kota_kab" required id="kota_kab" placeholder="Masukkan kota/kabupaten Anda">
          </div>

          <div class="form-permohonan">
            <label for="pekerjaan">Pekerjaan <span class="text-danger">*</span></label>
            <select id="id_pekerjaan" name="id_pekerjaan" required="">
              <option value="" disabled selected>Pilih jenis pekerjaan Anda</option>
              <option value="1">PNS / TNI / Polri</option>
              <option value="2">Pegawai Swasta</option>
              <option value="3">Konsultan</option>
              <option value="4">Guru / Dosen</option>
              <option value="5">Mahasiswa</option>
              <option value="6">Pelajar</option>
              <option value="7">Wiraswasta</option>
              <option value="8">Lain-lain</option>
            </select>
          </div>

          <div class="form-permohonan">
            <label for="nama-kantor">Nama Kantor/Instansi/Universitas <span class="text-danger">*</span></label>
            <input type="text" name="instansi" required id="instansi"
              placeholder="Masukkan nama kantor/instansi/universitas Anda" value="">
          </div>

        </fieldset>

        <fieldset>
          <legend><span class="number">2</span>Keterangan Permintaan Data</legend>

          <div class="form-permohonan">
            <label for="jenis-permintaan">Jenis Permintaan <span class="text-danger">*</span></label>
            <select id="jenis" name="jenis" required="">
              <option value="" disabled selected>Pilih jenis permintaan data Anda
              </option>
              <option value="Data Peta">Data Peta</option>
              <option value="Data Hidrologi">Data Hidrologi</option>
              <option value="Data Informasi Umum Organisasi">Data Informasi Umum
                Organisasi
              </option>
              <option value="Data Infrastruktur">Data Infrastruktur</option>
              <option value="Data Dokumen Teknis/Kebijakan">Data Dokumen
                Teknis/Kebijakan
              </option>
              <option value="Data Lainnya">Data Lainnya</option>
            </select>
          </div>

          <div class="form-permohonan">
            <label for="tujuan-penggunaan">Tujuan Penggunaan Data <span class="text-danger">*</span></label>
            <textarea type="text" name="tujuan" required id="tujuan" rows="3"
              placeholder="Masukkan tujuan penggunaan data Anda"></textarea>
          </div>

        </fieldset>

        <fieldset>
          <legend><span class="number">3</span>Upload Berkas</legend>

          <div class="form-permohonan">
            <label for="file-identitas">File Lampiran Identitas <span class="text-danger">*</span></label>
            <input type="file" id="ktp" name="ktp" required accept=".jpg, .jpeg, .png, .pdf">
          </div>
          <small class="form-text text-muted">Berkas identitas diri yang berlaku (KTP/SIM/Paspor).<span
              class="text-danger">**</span></small>

          <br><br>

          <div class="form-permohonan">
            <label for="file-surat">File Surat Permohonan <span class="text-danger">*</span></label>
            <input type="file" id="lampiran" name="lampiran" required multiple accept=".pdf">
          </div>
          <small class="form-text text-muted">Mohon lampirkan salinan surat resmi permohonan dalam format
            dokumen.<span class="text-danger">**</span></small>

        </fieldset>

        <small><strong>Keterangan:</strong></small><br>
        <small><span class="text-danger">*</span>) Wajib diisi</small><br>
        <small><span class="text-danger">**</span>) Tipe dokumen yang dapat diunggah: jpeg,
          jpg, png, pdf. Ukuran dokumen yang dapat diunggah maksimal 2MB.</small>
        <hr>
        <div hidden id="status"></div>
        <div hidden id="error-message" class="alert alert-danger mt-3"></div>
        <div hidden id="success-message" class="alert alert-success mt-3"></div>
        <div class="text-center">
          <!-- Tombol Kirim -->
          <button class="btn btn-success btn-lg " id="btnadd" name="submit">Kirim Data
            <i class='fas fa-save'></i></button>
          <!-- Tombol Batal -->
          <button class="btn btn-danger btn-lg" id="btncancel" name="cancel" data-bs-dismiss="modal">Batal
            <i class='fas fa-x'></i>
          </button>
        </div>
      </form>
    </div>
    <!--=======End Perimintaan Data=======-->
@endsection
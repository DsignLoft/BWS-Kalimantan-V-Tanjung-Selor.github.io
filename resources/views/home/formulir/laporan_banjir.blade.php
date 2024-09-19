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
          <small class="text-body-secondary">Laporan Bencana Banjir</small>
        </h2>
        <small>Mohon mengisi data permohonan pada E-formulir laporan bencana banjir
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
            <label for="alamat">Alamat <span class="text-danger">*</span></label>
            <textarea name="alamat" required id="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda"></textarea>
          </div>

          <div class="form-permohonan">
            <label for="kota/kab">Kota/Kabupaten <span class="text-danger">*</span></label>
            <input type="text" name="kota_kab" required id="kota_kab" placeholder="Masukkan kota/kabupaten Anda">
          </div>

        </fieldset>

        <fieldset>
          <legend><span class="number">2</span>Keterangan Laporan</legend>
          
          <div class="form-permohonan">
            <label for="email">Tanggal dan Waktu <span class="text-danger">*</span></label>
            <input type="text" name="date" required id="date" placeholder="Masukkan tanggal dan waktu banjir">
          </div>
          
          <div class="form-permohonan">
            <label for="email">Lokasi banjir <span class="text-danger">*</span></label>
            <input type="text" name="date" required id="date" placeholder="Masukkan lokasi banjir">
          </div>
          
          <div class="form-permohonan">
            <label for="email">Tinggi genangan (CM)<span class="text-danger">*</span></label>
            <input type="text" name="date" required id="date" placeholder="Masukkan tinggi genangan">
          </div>
          
          <div class="form-permohonan">
            <label for="email">Sungai terdekat<span class="text-danger">*</span></label>
            <input type="text" name="date" required id="date" placeholder="Masukkan sungai terdekat">
          </div>
          
          <div class="form-permohonan">
            <label for="email">Penyebab banjir<span class="text-danger">*</span></label>
            <textarea name="alamat" required id="alamat" rows="3" placeholder="Masukkan penyebab banjir"></textarea>
          </div>
          
          <div class="form-permohonan">
            <label for="email">Akibat banjir<span class="text-danger">*</span></label>
            <textarea name="alamat" required id="alamat" rows="3" placeholder="Masukkan akibat banjir"></textarea>
          </div>
          <div class="form-permohonan">
            <label for="email">Tindak lanjut/ Koordinasi<span class="text-danger">*</span></label>
            <textarea name="alamat" required id="alamat" rows="3" placeholder="Masukkan tindak lanjut/ koordinasi"></textarea>
          </div>
          
          <div class="form-permohonan">
            <label for="email">Sumber laporan<span class="text-danger">*</span></label>
            <input type="text" name="date" required id="date">
          </div>

        </fieldset>

        <fieldset>
          <legend><span class="number">3</span>Upload Berkas</legend>

          <div class="form-permohonan">
            <label for="file-identitas">Foto dokumentasi lokasi banjir (opsional)</label>
            <input type="file" id="ktp" name="ktp" required accept=".jpg, .jpeg, .png, .pdf">
          </div>
        </fieldset>
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
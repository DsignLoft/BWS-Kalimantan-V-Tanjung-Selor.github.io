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
    
    <!-- ======= Formulir Survei Section ======= -->
    <div id="container" class="form-pengaduan">
      <!-- Bagian header formulir -->
      <div id="body_header">
        <h2><strong>Masukan </strong>
          <small class="text-body-secondary">untuk kami</small>
        </h2>
        <small>Terimakasih telah menggunakan Layanan Kami.</small>
      </div>

      <!-- Bagian formulir -->
      <div class="row">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSehx_RjY9JECS24Qp-xB7Cl_u_Jzwbp8e9_vWM2Ik73vRLB9A/viewform?embedded=true" width="100%" height="4300" frameborder="0" marginheight="0" marginwidth="0">Memuat…</iframe>  
      </div>
    </div>
    <!-- ======= End Survei Section ======= -->

@endsection
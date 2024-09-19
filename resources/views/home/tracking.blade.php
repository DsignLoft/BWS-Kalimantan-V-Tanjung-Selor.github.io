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
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ======= Lacak Permohonan ======= -->
    <section id="tracking" class="contact section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><strong>Lacak Status </strong>
                    <small class="text-body-secondary">Permohonan Informasi</small>
                </h2>
                <div class="form-group mt-3">
                    <form class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="input-group">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="search" class="form-control" id="inputcari" placeholder="Masukkan nomor tiket permohonan Anda." aria-label="Text input with segmented dropdown button">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary cari">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-15 tampil bg-light">
                                <!-- Tempat konten timeline di sini -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= End Form Lacak ======= -->
@endsection
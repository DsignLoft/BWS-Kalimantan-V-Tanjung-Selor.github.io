@extends('layouts.main')
@section('main')
    @if($titles->is_banner == 1)
    <section class="hero-area">
      <div class="container" style="padding-top: 10px;">
          <div class="hero-slides owl-carousel">
                @foreach($banners as $banner)
                  <div class="single-hero-slide bg-img bg-overlay" style="background-image: url('https://update.xprint.id/images/banner/{{ $banner->img }}');">
                      <div class="container h-100">
                          <div class="row h-100 align-items-end ">
                              <div class="col-12 col-lg-7">
                                  <!-- Slides Content -->
                                  <div class="hero-slides-content" style="margin-bottom: 50px;margin-left: 20px;">
                                      @if($banner->is_bot == 1)
                                          <a href="{{ $banner->link }}">
                                      @else
                                          <a href="#">
                                      @endif
                                          <h3 data-animation="fadeInUp" data-delay="300ms">{{ $banner->text_id }}</h3>
                                      @if($banner->is_bot == 1)
                                          <br>
                                          <h6 class="date" data-animation="fadeInRight" data-delay="900ms">{{ $banner->text_en }}</h6>
                                      @endif
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Event Button -->
                      <div class="next-event-btn" data-animation="bounceInDown" data-delay="900ms">
                          <div class="container">
                              <div class="row">
                                  <div class="col-12 text-right">
                                      <!-- <a href="pages/posts/Penanaman-Pohon-dalam-Rangka-HUT-RI---79" class="btn theme-btn active">Selengkapnya</a> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach 
            </div>
      </div>
    </section>
    @endif
    
    @if($titles->is_anno == 1)
    <div class="container d-none d-sm-block">
      <div class="get-it">
          <div class="row">
              <div class="col-12 col-lg-2">
                  <!-- <div> -->
                  <h5 style="text-align:right;">{{ $titles->title_homepage1 }} :</h5>
                  <!-- </div> -->
              </div>
              <div class="col-12 col-lg-10 ">

                  <div id="pengumuman" class="carousel carousel-pe slide " data-ride="carousel">
                      <div class="carousel-inner carousel-inner-pe">
                          @foreach($informations as $info)
                            <div class="carousel-item active">
                                  <div class="carousel-caption carousel-caption-pe">
                                      <a href="#">{{ $info->info_title }}</a>
                                  </div>
                              </div>                   
                            </div>
                          @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#pengumuman" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true" style="padding-top: 15px;"></span>

                          <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#pengumuman" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true" style="padding-top: 15px;"></span>
                          <span class="sr-only">Next</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
    @endif
  <!-- ##### Pengumuman Area End ##### -->

  <div class="theme-blog-area section-padding-50-0">
      <div class="container">

          <div class="row">


          </div>
      </div>
  </div>
  <!-- ##### Blog Area End ##### -->

  @if($titles->is_news == 1)
  <section class="church-activities-area">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="section-heading text-center mx-auto">
                      <h1>{{ $titles->title_homepage2 }}</h1>
                  </div>
              </div>
          </div>

          <div class="row">
              <div class="col-12">
                  <div class="donate-slides owl-carousel">
                      <!-- Single Blog Area -->
                      <!-- <div class="col-12 col-lg-4"> -->
                        @foreach($news as $nw)
                            <div class="single-blog-area">
                              <div class="blog-thumbnail">
                                  <a href="{{ $nw->news_image }}" rel="prettyPhoto">
                                      <img class="center" src="{{ $nw->news_image }}" alt="{{ $nw->news_title }}">
                                  </a>
                              </div>
                              <div class="blog-content ">
                                  <div class="post-container" style="height:155px;">
                                      <a style="color:dodgerblue;" href="{{ route('detail.berita', $nw->news_slug) }}">{{ $nw->news_title }}</a>
                                      <br><br>
                                      {{ substr(strip_tags($nw->news_description), 0, 100) }}..
                                  </div>
                                  <p class="tanggal"><i>{{ date('d F Y H:i:s', strtotime($nw->news_date)) }}</i>
                                      <a href="{{ route('detail.berita', $nw->news_slug) }}" class="readmore-btn float-right">Selengkapnya</a>
                                  </p>
                              </div>
                          </div>
                        @endforeach  
                      
                      <!-- </div> -->
                  </div>
              </div>
          </div>
      </div>
  </section>
  @endif

  @if($titles->is_ads == 1)
  <div class="theme-blog-area section-padding-50-0">
      <div class="container">
          <div id="carouselBannerPENA" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                  <li data-target="#carouselBannerPENA" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselBannerPENA" data-slide-to="1"></li>
                  <li data-target="#carouselBannerPENA" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                  @foreach($ads as $ad)
                     @if($ad->main == 1)
                        <div class="carousel-item active">
                     @else
                        <div class="carousel-item">
                     @endif
                        <img src="https://update.xprint.id/images/banner/{{ $ad->img }}" class="d-block w-100" alt="{{ $ad->text_id }}">
                     </div>
                  @endforeach
              </div>
          </div>
      </div>
  </div>
  @endif
  
  <div class="theme-blog-area section-padding-30" style="padding-bottom:0px;">
      <div class="container">
          <div class="row">
              @if($titles->is_graf == 1)
              <div class="col-12 col-sm-6 col-lg-3">
                  <div class="panel panel-info">
                      <div class="panel-heading">
                          <h5>{{ $titles->title_homepage3 }}</h5>
                      </div>
                      <div class="panel-body">
                          <div id="infografis-ca" class="carousel slide" data-ride="carousel">
                              <ul class="carousel-indicators">
                                  <li data-target="#infografis-ca" data-slide-to="0" class="active"></li>
                                  <li data-target="#infografis-ca" data-slide-to="1"></li>
                                  <li data-target="#infografis-ca" data-slide-to="2"></li>
                                  <li data-target="#infografis-ca" data-slide-to="3"></li>
                              </ul>
                              <div class="carousel-inner">
                                  @foreach($infografis as $i)
                                    @if($i->main == 1)
                                      <div class="carousel-item active">
                                    @else
                                      <div class="carousel-item">
                                    @endif
                                      <a href="https://update.xprint.id/images/banner/{{ $i->img }}" rel="prettyPhoto"> 
                                        <center>
                                          <img src="https://update.xprint.id/images/banner/{{ $i->img }}" alt="{{ $i->text_id }}" style="width: auto ; height: 430px;">
                                        </center>
                                      </a>
                                    </div>
                                  @endforeach
                              </div>
                              <a class="carousel-control-prev" href="#infografis-ca" data-slide="prev">
                                  <span class="fa fa-2x fa-chevron-left" aria-hidden="true" style="padding-top: 15px;color: #006699"></span>
                              </a>
                              <a class="carousel-control-next" href="#infografis-ca" data-slide="next">
                                  <span class="fa fa-2x fa-chevron-right" aria-hidden="true" style="padding-top: 15px;color: #006699"></span>
                                  <span class="sr-only">Next</span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              @endif

              @if($titles->is_gallery == 1)
              <div class="col-12 col-sm-6 col-lg-9">
                  <div class="blog-widget-area">
                      <h5>{{ $titles->title_homepage4 }}</h5>
                      <br>
                      <div class="galeri-slides owl-carousel">
                          @foreach($galleries as $gal)
                            <div class="single-donate-slide">
                                <img class="center" style="height:127px;" src="https://update.xprint.id/images/banner/{{ $gal->img }}" alt="{{ $gal->text_id }}">
                                <div class="donate-btn text-center">
                                    <a href="https://update.xprint.id/images/banner/{{ $gal->img }}" rel="prettyPhoto" class="btn btn-sm btn-primary">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    @if($gal->is_bot == 1)
                                    <a href="{{ $gal->link }}" class="btn btn-sm btn-primary">
                                        {{ $gal->text_en }}
                                    </a><br>
                                    @endif
                                    <span class="text-center" style="color:white">{{ $gal->text_id }}</span>
                                </div>
                            </div>
                          @endforeach
                        </div>
                  </div>
                  @endif
                  
                  @if($titles->is_service == 1)
                  <div class="blog-widget-area">
                      <h5>{{ $titles->title_homepage5 }}</h5>
                      <br>
                      <div class="galeri-slides owl-carousel">
                        @foreach($services as $service)
                          <div class="single-hero-slide bg-img bg-overlay" style="background-image: url({{ $service->service_image }});">
                              <div class="container h-70">
                                  <div class="row h-70 align-items-end ">
                                      <p class="card-text"><br><br><br><br><br><br></p>
                                      <!-- <center><a href="https://bbwspemalijuana.com/layananinformasi/" class="btn btn-primary">LUMPIA</a></center> -->
                                      <center><a href="{{ $service->service_link }}" class="btn btn-primary">{{ $service->service_name }}</a></center>
                                  </div>
                              </div>
                          </div>
                        @endforeach
                      </div>
                  </div>
              </div>
              @endif
          </div>
      </div>


  <div class="theme-blog-area section-padding-30" style="padding-bottom:0px;">

      @if($titles->is_info == 1)
      <section class="church-activities-area">
          <div class="container">
              <div class="blog-widget-area" style="padding-bottom: 7px;">
                  <h5>{{ $titles->title_homepage6 }}</h5>
                  <div class="galeri-slides owl-carousel">
                      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(https://sda.pu.go.id/balai/bbwspemalijuana/files/publik/informasiberkala.jpg);">
                          <div class="container h-100">
                              <div class="row h-100 align-items-end ">
                                  <p class="card-text"><br><br><br><br><br><br></p>
                                  <a href="#" class="btn btn-primary">INFORMASI BERKALA</a>
                              </div>
                          </div>
                      </div>
                      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(https://sda.pu.go.id/balai/bbwspemalijuana/files/publik/Gaambar-Informasi-Serta-Merta.jpg);">
                          <div class="container h-100">
                              <div class="row h-100 align-items-end ">
                                  <p class="card-text"><br><br><br><br><br><br></p>
                                  <a href="#" class="btn btn-primary">INFORMASI SERTA MERTA</a>
                              </div>
                          </div>
                      </div>
                      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(https://sda.pu.go.id/balai/bbwspemalijuana/files/publik/1744.jpg);">
                          <div class="container h-100">
                              <div class="row h-100 align-items-end ">
                                  <p class="card-text"><br><br><br><br><br><br></p>
                                  <a href="#" class="btn btn-primary">INFORMASI SETIAP SAAT</a>
                              </div>
                          </div>
                      </div>
                      <div class="single-hero-slide bg-img bg-overlay" style="background-image: url(https://sda.pu.go.id/balai/bbwspemalijuana/files/img/maklumat.png);">
                          <div class="container h-100">
                              <div class="row h-100 align-items-end ">
                                  <p class="card-text"><br><br><br><br><br><br></p>
                                  <a href="#" class="btn btn-primary">MAKLUMAT PELAYANAN</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- </div> -->
      </section>

      <div class="theme-blog-area section-padding-25-0">
          <div class="container">
              <div>
                  <a href="/"><img src="https://sda.pu.go.id/balai/bbwspemalijuana/files/Banner website ukuran 1024x308 (3).jpg" alt="bannerLPSE" width="100%" height="40%"></a>
              </div>
          </div>
      </div>
      <br>
      @endif
      
      @if($titles->is_feed == 1)
      <section class="church-activities-area">
          <div class="container">
              <div class="blog-widget-area" style="padding-bottom: 7px;">
                  <h5>{{ $titles->title_homepage7 }}</h5>
                  <div class="galeri-slides owl-carousel">
                      <!-- <div class="single-hero-slide bg-img bg-overlay">
                      <div class="container h-100"> -->
                                        </div>
              </div>
          </div>
      </section><!-- ##### Footer Area Start ##### -->
      @endif
      
      <!-- ##### Blog Area Start ##### -->
      <div class="blog-area section-padding-50">
          <div class="container">
              <div class="row">
                  <!-- ##### Accordians ##### -->
                  <div class="col-12 col-lg-12">
                      <!-- Title -->
                      <h1>Frequently Asked Questions </h1>
                      <p>Berikut daftar pertanyaan yang paling sering diajukan kepada kami:</p>
                      <hr>
                      <div class="accordions " id="accordion" role="tablist" aria-multiselectable="true">
                          @foreach($faqs as $f)
                          <div class="panel single-accordion">
                              <h6>
                                  <a role="button" class="collapsed" aria-expanded="true" aria-controls="faq{{ $f->id_faq }}" data-toggle="collapse" data-parent="#accordion" href="#faq{{ $f->id_faq }}">
                                      {{ $f->faq_question }}
                                      <span class="accor-open"><i class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i></span>
                                      <span class="accor-close"><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i></span>
                                  </a>
                              </h6>
                              <div class="artikel">
                                  <div id="faq{{ $f->id_faq }}" class="accordion-content collapse">
                                      <p>
                                         {{ $f->faq_answer }}
                                      </p>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
@endsection

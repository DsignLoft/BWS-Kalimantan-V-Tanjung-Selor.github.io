@extends('layouts.main')
@section('main')
<style>
    @import url('https://fonts.googleapis.com/css?family=Space+Mono:400,700|Teko:400');
 * {
	 box-sizing: border-box;
}
 img {
	 display: block;
	 max-width: 100%;
	 height: auto;
}
 .card {
	 display: block;
	 margin: 10px;
	 margin-right: 10px;
	 perspective: 1000px;
	 position: relative;
	 transition: transform 0.1s ease;
	 text-decoration: none;
	 width: 320px;
	 height: 420px;
}
 .card::before {
	 content: '';
	 display: block;
	 box-shadow: #000 0 0 100px 30px;
	 position: absolute;
	 top: 20%;
	 right: 20%;
	 bottom: 10px;
	 left: 20%;
	 transition: opacity 0.3s ease, box-shadow 0.5s ease;
	 z-index: -1;
	 opacity: 1;
	 mix-blend-mode: overlay;
}
 .card:active {
	 transform: scale(0.99);
}
 .card:hover::before {
	 box-shadow: #000 0 -5px 120px 20px;
	 opacity: 1;
}
 .card:hover .card__inner {
	 transform: rotate3d(0.5, 0, 0.1, 5deg);
}
 .card:hover .card__inner::before {
	 opacity: 0.4;
}
 .card__inner {
	 background: #fff;
	 border-radius: 5px;
	 overflow: hidden;
	 transition: transform 0.3s ease;
	 position: relative;
}
 .card__inner::before {
	 content: '';
	 display: block;
	 background: -webkit-linear-gradient(to bottom, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0));
	/* Chrome 10-25, Safari 5.1-6 */
	 background: linear-gradient(to bottom, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0));
	/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
	 opacity: 0;
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 bottom: 50%;
	 transition: opacity 0.3s ease;
}
 .card_img {
	 background: #ddd;
	 padding: 0;
	 margin: 0;
}
 .card__content {
	 padding: 20px;
	 color: #fff;
}
 .card__title {
	 font-family: Teko;
	 text-transform: uppercase;
	 letter-spacing: 0.1em;
	 font-weight: normal;
	 margin: 0;
}
 .card__subtitle {
	 font-family: Teko;
	 text-transform: uppercase;
	 letter-spacing: 0.21em;
	 font-weight: normal;
	 margin: 0;
	 font-size: 1em;
}
 .card__description {
	 margin-bottom: 2em;
	 color: #c5c5d4;
}
 .card__cta {
	 font-weight: bold;
	 border-bottom: 2px solid rgba(255, 255, 255, 0.7);
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
    <div class="get-it mb-2">
    <div class="row" style="background-color: #fff;">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-3">
            <div class="wrapper">
    <a href="{{ route('detail.rekomtek', 'izin-pengusahaan-sda') }}" class="card">
      <div class="card__inner">
        <img src="https://freeusdt.xprint.id/nsm/buya/uploads/images/services/1.JPG" style="width: 30%" class="card_img">
        <div class="card__content">
          <h1 class="card__title">
            Izin Pengusahaan SDA
          </h1>
          <div class="card__description">
            <p>
            Pemanfaatan Sumber Daya Alam (SDA) dalam memenuhi kebutuhan usaha, seperti Transportasi, Pembangkit Listrik Tenaga Air (PLTA), Olahraga, Pariwisata dan sebagainya. Materi ini mencakup air baku untuk penyediaan air bersih, kegiatan industri, perhotelan dan lain sebagainya.
          </p>
                      </div>
          <p><span class="card__cta">Lebih Lanjut</span></p>

        </div>
      </div>
  </a>
</div>
        </div>
        <div class="col-md-3">
            <div class="wrapper">
    <a href="{{ route('detail.rekomtek', 'izin-penggunaan-sda') }}" class="card">
      <div class="card__inner">
        <img src="https://freeusdt.xprint.id/nsm/buya/uploads/images/services/2.JPG" style="width: 30%" class="card_img">
        <div class="card__content">
          <h1 class="card__title">
            Izin Penggunaan SDA
          </h1>
          <div class="card__description">
            <p>
            Pemanfaatan Sumber Daya Alam (SDA) dalam memenuhi kebutuhan bukanlah usaha. Kebutuhan sehari-hari dari kelompok besar (>150 orang/titik) atau >60 loh. Menciptakan perubahan dalam kondisi Sumber Alam.
          </p>
                      </div>
          <p><span class="card__cta">Lebih Lanjut</span></p>

        </div>
      </div>
  </a>
</div>
        </div>
        <div class="col-md-3">
            <div class="wrapper">
    <a href="{{ route('detail.rekomtek', 'izin-pegalihan-alur-sungai') }}" class="card">
      <div class="card__inner">
        <img src="https://freeusdt.xprint.id/nsm/buya/uploads/images/services/3.JPG" style="width: 30%" class="card_img">
        <div class="card__content">
          <h1 class="card__title">
            Izin Pengalihan Alur Sungai
          </h1>
          <div class="card__description">
            <p>
            Izin pengalihan Alur Sungai berdasarkan Permen PUPR No.21/PRT/M/2020
          </p>
                      </div>
          <p><span class="card__cta">Lebih Lanjut</span></p>

        </div>
      </div>
  </a>
</div>
        </div>
        <div class="col-md-1">
            
        </div>
    </div>
</div>
@endsection
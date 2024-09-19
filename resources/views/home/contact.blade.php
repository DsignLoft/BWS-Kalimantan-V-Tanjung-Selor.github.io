@extends('layouts.main')
@section('main')
    <!-- ##### Header Area End ##### --><!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner3.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-10">
                <div class="breadcumb-text">
                    <!--<h5>Beranda -> Berita SDA</h5>-->
                    <h2>Kontak Kami</h2>
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

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <!-- Title -->
                <h1>Hubungi Kami</h1>

                <hr>
            </div>
            <div class="col-12 col-lg-6">
                <form method="post" enctype="multipart/form-data" action="https://sda.pu.go.id/balai/bbwspemalijuana/Pages/contact_us_add">
                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> <label><b>Nama Lengkap</b>*</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Isikan Nama Lengkap Anda" name="nama_pengirim" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span> <label><br><b>E-mail</b>*</label>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Isikan e-Mail Anda" name="email_pengirim" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span> <label><br><b>Nomor Telepon</b>*</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Isikan No Telepon/HP" name="telp_pengirim" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-send"></i></span> <label><br><b> Judul Pesan</b>*</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Isikan Judul/Subject Pesan" name="judul" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <span class="input-group-addon"><i class="fa fa-list-alt"></i></span> <label><br><b>Pesan</b>*</label>
                        <div class="input-group">
                            <textarea class="form-control" rows="9" placeholder="Isikan Pesan Anda" name="pesan" required></textarea>
                        </div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LfB4esdAAAAAG0X2OnepS77jaPS2GRLgoisGoxn"></div>


                    <center><br><button class="btn btn-primary btn-sm" type="submit"><b>Kirim </b><span class="input-group-addon"><i class="fa fa-envelope-o"></i></span></button></center>

                </form>



                <!-- Post Content -->
                <div class="artikel">

                    <p>
                        <!--  -->
                    </p>
                </div>


            </div>
            <div class="col-12 col-lg-6 section-padding-30">
                <div class="single-contact-area mb-30">
                    <b>Kontak Kami:</b> <br>
                    <span>
                        <strong>Balai Wilayah Sungai Kalimantan V Tanjung Selor</strong><br>
                        Jl. Bhayangkara No. 59D RT.66, Karang Anyar, Tarakan Barat, Kalimantan Utara, 77111  </span>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15932.402320529098!2d117.58184!3d3.3253214!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3214753e0c442731%3A0xa02413239a7f442b!2sBalai%20Wilayah%20Sungai%20Kalimantan%20V!5e0!3m2!1sid!2sid!4v1724375088388!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </div>

        </div>
    </div>
</div>


<!-- ##### Blog Area End ##### --><!-- ##### Footer Area Start ##### -->
@endsection
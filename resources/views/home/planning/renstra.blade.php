@extends('layouts.main')
@section('main')
<div class="breadcumb-area bg-img" style="background-image: url(https://freeusdt.xprint.id/nsm/buya/uploads/images/banner1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-10">
                <div class="breadcumb-text">
                    <h2>Rencana Strategis BWS Kalimantan V Tanjung Selor</h2>
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
                <h1 align="center">Rencana Strategis Balai Wilayah Sungai Kalimantan V Tanjung Selor</h1>

                <hr>
                
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-active">
                        <th>Rencana Strategis Balai Wilayah Sungai Kalimantan V Tanjung Selor</th>
                        <th>Akses</th>
                    </thead>
                    
                    <tbody>
                        <td>Buku Renstra 2020 - 2024 BWS Kalimantan V</td>
                        <td><a href="https://freeusdt.xprint.id/nsm/buya/uploads/files/Buku Renstra 2020 - 2024 BWS Kalimantan V 15012021.docx" class="readmore-btn">download</a></td>
                    </tbody>
                    
                </table>

                </div>
                
            </div>


            </div>

        </div>
    </div>
</div>
@endsection
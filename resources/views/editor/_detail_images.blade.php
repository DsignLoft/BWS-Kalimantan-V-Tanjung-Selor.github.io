<style>
    .verikal_center{
        border-left: 1px solid #7e7e7e;
        height: 100%;
        width : 2px;
        margin-right: 70%;
    }
</style>
<div class="detail-gallery">
    @foreach ($data as $thumb)
        <div class="row">
            <div class="col-md-1" style="margin-top: 4%;">
                <div class="verikal_center"></div>
                <p style="margin-left: 90%;" id="info_height">*Tinggi</p>
            </div>
            <div class="col-md-11">
                <figure class="border-radius-10">
                    <hr id="line_width" style="width: 100%; border-bottom: 1px solid #1f1a1a; color: #1f1a1a" />
                    <p style="text-align: center" id="info_width">*Lebar</p>
                    <img src="{{ $thumb->thumbnail_url }}" alt="product image" style="width: 100%" />
                </figure>
            </div>
        </div>
    @endforeach
</div>

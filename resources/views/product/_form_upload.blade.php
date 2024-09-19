<?php $databaseHost = 'localhost'; $databaseName = 'idp_w2p'; $databaseUsername = 'idp_w2p'; $databasePassword = 'Dur14n100$'; $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); $url= $_SERVER['REQUEST_URI']; $aPath = explode('/', $url); ?>
        <!-- upload -->
    @if ($product->category != 17)
        <div class="tab-style3 file-upload">
            <ul class="nav nav-tabs text-uppercase">
                <li class="nav-item">
                    <a class="nav-link active" id="image-page-tab" data-bs-toggle="tab" href="#image-page">Upload Design</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="link-page-tab" data-bs-toggle="tab" href="#link-page">Link Design</a>
                </li>
                    <?php
                    $get_template = mysqli_query($connect_w2p, 'SELECT * FROM idp_products WHERE id_product="'.$aPath[2].'"');
                foreach ($get_template as $template) {
                    ?>
                    <?php $get_categories = mysqli_query($connect_w2p, 'SELECT * FROM nsm_categories WHERE category_id="'.$template['category'].'" LIMIT 1');
                if (mysqli_num_rows($get_categories) > 0) { ?>
                    <?php foreach ($get_categories as $category) { ?>
                <li class="nav-item"><a class="nav-item2 nav-link mb-0" href="{{ route('template.category', $category['category_id']) }}">Browse Designs</a></li>
                <?php } ?>
                <?php } else { ?>
                <li class="nav-item"><a class="nav-item2 nav-link mb-0" href="#not-yet-browse" id="not-yet-browse">Browse Designs</a></li>
                <?php } ?>
                <?php } ?>
            </ul>
        </div>
        <div class="tab-content mt-2">
            <!-- IMAGE  -->
            <div class="active tab-pane" id="image-page">
                <table class="table table-bordered mw-100 bg-white">
                    <tr>
                        @foreach ($layouts as $layout)
                            <td class="p-2 bg-white @error('design_img') border-danger @enderror">
                                @foreach ($layouts as $idl => $layout)
                                    <li class="nav-item" style="list-style-type: none;">
                                        <input type="file" name="design_img[]" id="file-{{ $idl }}" class="inputfile inputfile-3" data-design="{{ $idl }}" accept=".pdf,.jpg,.png,.tif,.jpeg,.zip,.rar" hidden required>
                                        @if (count($layouts) == 1)
                                            <label for="file-{{ $idl }}" class="nav-item2 tmbl-up mb-0"> <span> KLIK DISINI UNTUK UPLOAD DESIGN KAMU</span></label>
                                        @else
                                            <label for="file-{{ $idl }}" class="nav-item2 tmbl-up mb-0"> <span> KLIK DISINI UNTUK UPLOAD DESIGN KAMU {{ $idl + 1 }}</span></label>
                                        @endif
                                    </li>
{{--                                    <script type="text/javascript">--}}
{{--                                        function formatBytes(a,b=2){if(!+a)return"0 Bytes";const c=0>b?0:b,d=Math.floor(Math.log(a)/Math.log(1024));return`${parseFloat((a/Math.pow(1024,d)).toFixed(c))} ${["Bytes","KiB","MiB","GiB","TiB","PiB","EiB","ZiB","YiB"][d]}`}--}}
{{--                                        $('#file-{{ $idl }}').bind('change', function() {--}}
{{--                                            //this.files[0].size gets the size of your file.--}}
{{--                                            alert('Ukuran File Anda' + ' ' + formatBytes(this.files[0].size));--}}
{{--                                        });--}}
{{--                                    </script>--}}
                                @endforeach
                                @error('design_img')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align: center;">
                                        {{ $message }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                @enderror
                                <input type="hidden" name="layout[]" value="{{ $layout }}">
                                <div class="text-center mw-100">
                                    <div class="text-file" id="text-file{{ $loop->index }}"><span></span></div>
                                    <img src="" alt="" id="upload-preview{{ $loop->index }}" class="img-upload mw-50">
                                    <canvas id="pdfViewer{{ $loop->index }}"></canvas>
                                </div>
                                <p style="font-size: 10px;">Ukuran File Upload maksimal 20 Mb, lebih dari 20 Mb silahkan menggunakan <a href="https://indoprinting.infogotalent.com/" target="_blank">IDP Shared.</a></p>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>
            <!-- LINK  -->
            <div class="form-group row tab-pane pl-3 mb-2" id="link-page">
                <x-input type="text" name="link" value="{{ old('link') }}" id="link-design" />
                <small><a href="https://indoprinting.infogotalent.com/" target="_blank"><i class="fi-sr-upload"></i> atau klik disini untuk upload banyak file </a></small>
                <br />
                <small style="color:red;">*Mohon pastikan link design bisa diakses oleh kami.</small>
            </div>
        </div>
    @endif

    <script type="text/javascript">
        document.querySelector("#not-yet-browse").addEventListener('click', function(){
            Swal.fire(
                'Mohon Maaf!',
                'Saat ini produk yang anda pilih belum tersedia template, Silahkan memilih produk lainnya',
                'warning'
            )
        });
        if (localStorage.getItem('url') != null){
            localStorage.removeItem('url');
        }
        $('#design-online').click(function(){
            function maketextnumber(n) {
                for (var r = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n",
                        "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F",
                        "G", "H", "I",  "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W",
                        "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
                         e = n, t = new Array, a = 0; a <= e - 1; a++) {
                    t[a] = r[parseInt(Math.random() * r.length)];
                    t = t;
                    randomtextnumber = t.join("")
                }
            }
            localStorage.setItem('url', window.location.href);
            window.location.href = "https://indoprinting.co.id/studio?"+maketextnumber(120)+randomtextnumber;
        });
        document.getElementById("link-design").value = localStorage.getItem('design');
        document.getElementById("link-design").innerHTML = localStorage.getItem('design');

        if (localStorage.getItem('design') != null){
            localStorage.removeItem('design');
        }

    </script>

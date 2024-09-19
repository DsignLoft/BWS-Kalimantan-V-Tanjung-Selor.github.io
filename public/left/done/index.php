<!DOCTYPE HTML>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDP Design Online | Design Produk anda sesuai dengan kebutuhan dan keinginan</title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta content="Beli produk indoprinting Official online, produk terlengkap dan harga terbaik. Dapatkan berbagai promo menarik. Belanja aman dan nyaman hanya di indoprinting.co.id" name="description">
    <meta content="indoprinting, design custom, gambar sendiri, semarang, indonesia" name="keywords">

    <!-- Favicons -->
    <link href="https://indoprinting.co.id/assets/images/logo/favicon.png" rel="icon">
    <!-- Style sheets -->
    <link rel="stylesheet" type="text/css" href=" https://indoprinting.co.id/editor-online/css/main.css">
    <link rel="stylesheet" href=" https://indoprinting.co.id/assets/vendor/bootstrap/css/nsm_sweetalert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- The CSS for the plugin itself - required -->
    <link rel="stylesheet" type="text/css" href=" https://indoprinting.co.id/editor-online/css/FancyProductDesigner-all.css" />

    <!-- Include required jQuery files -->
    <script src=" https://indoprinting.co.id/editor-online/js/jquery.min.js" type="text/javascript"></script>
    <script src=" https://indoprinting.co.id/editor-online/js/jquery-ui.min.js" type="text/javascript"></script>

    <!-- HTML5 canvas library - required -->
    <script src=" https://indoprinting.co.id/editor-online/js/fabric.min.js" type="text/javascript"></script>
    <script src=" https://indoprinting.co.id/editor-online/js/jquery-confirm.min.js" type="text/javascript"></script>
    <script src=" https://indoprinting.co.id/editor-online/js/jquery-confirm.min.css" type="text/javascript"></script>
    <!-- The plugin itself - required -->
    <script src=" https://indoprinting.co.id/editor-online/js/FancyProductDesigner-all.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/7c05a480bd.js" crossorigin="anonymous"></script>

    <style>
        .logo-custom {
            width: 40%;
            height: 20%;
            margin-top: 2px;
        }
        .mobile-button {
            border-radius: 5px;
            font-size: 17px;
        }
        @media screen and (min-width: 450px) {
            .logo-custom {
                width: 220px;
                height: 55px;
            }
            .mobile-button {
                border-radius: 12px;
            }
        }

        .modal .modal-dialog-aside{
            width: 100%; max-width:100%; height: 100%; margin:0;transform: translate(0); transition: transform .2s;
        }
        .modal .modal-dialog-aside .modal-content{  height: inherit; border:0; border-radius: 0;}
        .modal .modal-dialog-aside .modal-content .modal-body{ overflow-y: auto }
        .modal.fixed-left .modal-dialog-aside{ margin-left:auto;  transform: translateX(100%); }
        .modal.fixed-right .modal-dialog-aside{ margin-right:auto; transform: translateX(-100%); }
        .modal.show .modal-dialog-aside{ transform: translateX(0);  }
    </style>

    <script type="text/javascript">
        if (localStorage.getItem('url') != null){
            $(document).ready(function(){

                var $yourDesigner = $('#clothing-designer'),
                    pluginOpts = {
                        productsJSON: 'https://indoprinting.co.id/editor-online/json/'+localStorage.getItem('design_json')+'.json', //see JSON folder for products sorted in categories
                        designsJSON: 'https://indoprinting.co.id/editor-online/json/designs.json', //see JSON folder for designs sorted in categories
                        stageWidth: 1000,
                        stageHeight: 600,
                        editorMode: false,
                        smartGuides: true,
                        uiTheme: 'doyle',
                        fonts: [
                            {name: 'Arial', url: 'google'},
                            {name: 'Lobster', url: 'google'},
                        ],
                        customTextParameters: {
                            colors: true,
                            removable: true,
                            resizable: true,
                            draggable: true,
                            rotatable: true,
                            autoCenter: true,
                            boundingBox: "Base",
                            curvable: true
                        },
                        customImageParameters: {
                            draggable: true,
                            removable: true,
                            resizable: true,
                            rotatable: true,
                            colors: '#ec823c',
                            autoCenter: true,
                            boundingBox: "Base"
                        },
                        actions:  {
                            'top': ['undo','redo', 'zoom', 'snap', 'print', 'download'],
                            'right': ['magnify-glass', 'reset-product', 'qr-code', 'ruler'],
                            'bottom': [],
                            'left': []
                        }
                    },

                    yourDesigner = new FancyProductDesigner($yourDesigner, pluginOpts);

                $('#process-payment').click(function() {
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-dark',
                            cancelButton: 'btn btn-light'
                        },
                        buttonsStyling: false
                    })

                    swalWithBootstrapButtons.fire({
                        title: 'Anda yakin untuk melanjutkan?',
                        text: "Design yang telah anda buat akan digunakan oleh tim kami untuk diproduksi",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Iya, saya yakin!',
                        cancelButtonText: 'Tidak, batalkan!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let timerInterval
                            Swal.fire({
                                title: 'Kami Proses Terlebih dahulu',
                                html: 'Mohon menunggu sebentar, proses design anda akan selesai dalam <b></b> detik.',
                                timer: 7000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                    yourDesigner.getProductDataURL(function(dataURL) {
                                        $.post("https://indoprinting.co.id/assets/images/design/save_image.php",
                                            {
                                                base64_image: dataURL
                                            },
                                            function(data, status){
                                                localStorage.setItem('design', data);
                                            });
                                    });
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: 'Proses design anda telah selesai',
                                        text: 'Mohon tunggu sebentar, anda akan dialihkan kehalaman selanjutnya!',
                                        showConfirmButton: false,
                                        timer: 4000
                                    })
                                }
                            }).then(() => {
                                /* Read more about handling dismissals below */
                                window.location.href = localStorage.getItem('url');
                            },4000);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                'Dibatalkan',
                                'Silahkan cek design anda kembali, selamat tenggelam dalam imajinasi tanpa batas :)',
                                'error'
                            )
                        }
                    });
                });

                $('#rendering-image').click(function() {
                    if (localStorage.getItem('preview') != null) {
                        localStorage.removeItem('preview');
                    } else {
                        let timerInterval
                        Swal.fire({
                            title: 'Rendering Process',
                            html: 'Mohon menunggu sebentar, design anda kami proses dan akan selesai dalam <b></b> detik.',
                            timer: 10000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    b.textContent = Swal.getTimerLeft()
                                }, 100)
                                yourDesigner.getProductDataURL(function(dataURL) {
                                    $.post("https://indoprinting.co.id/assets/images/design/preview/preview_image.php",
                                        {
                                            base64_image: dataURL
                                        },
                                        function(data, status){
                                            localStorage.setItem('preview', data);
                                        });
                                });
                            },
                            willClose: () => {
                                clearInterval(timerInterval);
                            }
                        }).then(() => {
                            /* Read more about handling dismissals below */
                            document.getElementById('click').click();
                        });
                    }
                });
                document.getElementById("renderImg").src = localStorage.getItem('preview');

                $('#preview-design').click(function(){
                    var product = yourDesigner.getProduct();
                    console.log(product);
                    return false;
                });
                $('#save-design').click(function(){
                    var product = yourDesigner.getProduct();
                    console.log(product);
                    return false;
                });

                $('#print-button').click(function(){
                    yourDesigner.print();
                    return false;
                });
                $('#image-button').click(function(){
                    var image = yourDesigner.createImage();
                    return false;
                });

                $('#checkout-button').click(function(){
                    var product = yourDesigner.getProduct();
                    console.log(product);
                    return false;
                });

                $yourDesigner.on('priceChange', function(evt, price, currentPrice) {
                    $('#thsirt-price').text(currentPrice);
                });

                $('#send-image-mail-php').click(function() {

                    yourDesigner.getProductDataURL(function(dataURL) {
                        $.post( "php/send_image_via_mail.php", { base64_image: dataURL} );
                    });

                });

                $('#click').click(function(){
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
                    window.location.href = "https://indoprinting.co.id/studio/review?"+maketextnumber(120)+randomtextnumber;
                });

            });
        } else {
            window.location.href = "https://indoprinting.co.id/";
        }
        if (localStorage.getItem('design') != null){
            localStorage.removeItem('design');
        }
    </script>
</head>

<body>
<div id="main-container">
    <div class="fpd-clearfix mobile-clearfix" style="margin-bottom: 7px; margin-top: 7px;">
        <div class="api-buttons fpd-container fpd-left mobile-logo" style="margin-top: 4px;">
            <a href="https://indoprinting.co.id/">
                <img src="https://indoprinting.co.id/assets/images/logo/logo-idp.png" class="logo-custom" />
            </a>
        </div>
        <div class="api-buttons fpd-container fpd-left mobile-logo" style="margin-top: 23px; margin-left: 23px">
            <a id="save-design" style="color: #000000;"><i class="fa-solid fa-download"></i>&nbsp;&nbsp; Save Design</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="#" style="color: #000000;"><i class="fa-solid fa-upload"></i>&nbsp;&nbsp; Load Design</a>
        </div>
        <div class="api-buttons fpd-container fpd-right" style="margin-top: 14px">
            <a href="javascript:window.location.href = localStorage.getItem('url'); localStorage.removeItem('design');" style="color: #000000;">Kembali</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-light mobile-button" id="click" hidden>Review</button>
            <button type="button" class="btn btn-light mobile-button" data-toggle="modal" data-target=".bd-example-modal-lg" id="#" hidden>Preview</button>
            <a id="preview-design" class="btn btn-light mobile-button"><i class="fa-solid fa-eye"></i>&nbsp; Preview</a>
            &nbsp;&nbsp;&nbsp;
            <a id="rendering-image" class="btn btn-dark mobile-button text-white">Selanjutnya <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
    <div id="clothing-designer" class="fpd-container fpd-views-inside-right fpd-top-actions-centered fpd-bottom-actions-centered fpd-sidebar fpd-sidebar-right fpd-tabs fpd-module-visible"></div>
</div>
<div class="modal fixed-left fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-aside">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="renderImg" width="100%" class="data-tilt" transform-style: preserve-3d/>
                        </div>
                        <div class="col-md-6">
                            <h1 style="font-family: Helvetica; font-variant: normal; font-style: normal">Design Review</h1>
                            <p>All set? Let’s double check:</p>
                            <p>	&#10004; Text: Is it clear and legible?</p>
                            <p>	&#10004; Margin: Is everything within the space?</p>
                            <p>	&#10004; Info: Everything accurate? Spelled correctly?</p>
                            <p>	&#10004; Images: Is everything clear (no blur)?</p>
                            <input type="checkbox" name="" required checked/> I've reviewed and approve my design.
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <button id="#" class="btn btn-dark">Continue <i class="fa-solid fa-arrow-right"></i></button>
                                    <a href="javascript:location.reload();localStorage.removeItem('preview');" class="btn btn-light ml-2"><i class="fa-solid fa-pencil"></i> Edit design saya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
<script type="text/javascript">
    $('.data-tilt').tilt({
        glare: true,
        maxGlare: .5,
    })
</script>
</body>
</html>

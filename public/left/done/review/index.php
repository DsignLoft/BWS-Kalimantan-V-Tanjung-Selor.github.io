<!DOCTYPE HTML>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Your Design | IDP Design Online</title>
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
    </style>

    <script type="text/javascript">
        if (localStorage.getItem('preview') != null){
            document.getElementById("renderImg").value = localStorage.getItem('url');
        }
        console.log(localStorage.getItem('url'));
    </script>
</head>

<body>
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
                    <button type="button" class="btn btn-light ml-2" data-dismiss="modal"><i class="fa-solid fa-pencil"></i> Edit design saya</button>
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

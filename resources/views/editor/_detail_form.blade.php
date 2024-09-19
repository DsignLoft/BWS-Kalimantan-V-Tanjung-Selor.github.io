@php
    $databaseHost = 'localhost';
    $databaseName = 'idp_w2p';
    $databaseUsername = 'idp_w2p';
    $databasePassword = 'Dur14n100$';
    $connect_w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
    $url= $_SERVER['REQUEST_URI'];
    $aPath = explode('/', $url);

        function randomString($length = 250)
        {
            $str = "";
            $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'));
            $max = count($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
            }
            return $str;
        }
@endphp

<form action="https://studio.indoprinting.co.id/editor.php?product_base={{$value->id}}" method="POST" enctype="multipart/form-data" id="formDetail">
    @csrf
    <?php if (!isset($_COOKIE['nsm_nid'])) : ?>
    <input type="hidden" name="designs_nid" value="<?= randomString() ?>">
    <?php else : ?>
    <input type="hidden" name="designs_nid" value="<?= $_COOKIE['nsm_nid'] ?>">
    <?php endif; ?>
    <input type="hidden" name="designs_uid" value="<?= randomString() ?>">
    <input type="hidden" value="" name="grand_total_price" id="grand_total_price">
    <input type="hidden" name="id" value="#">
    <input type="hidden" name="no_design" value="1">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Item</th>
            <th>Isian & Pilihan</th>
            <th width="20%">Harga</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>Ukuran (cm)</td>
            <td>
                <select class="form-select" id="nsm_size" name="nsm_size" style="width: 100%" required>
                    <option value="" selected>Pilih Ukuran</option>
                    <?php
                    $size = mysqli_query($connect_w2p, "SELECT * from nsm_size LEFT JOIN nsm_size_category ON nsm_size.size_id = nsm_size_category.id_size_category LEFT JOIN nsm_products ON nsm_products.size_id = nsm_size_category.id_size_category WHERE nsm_products.id = '".$aPath[2]."'");
                    foreach ($size as $size_value) {
                        ?>
                    <option value="<?= $size_value['size_value'] ?>x<?= $size_value['size_name'] ?>">
                        <?= $size_value['size_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Jenis Bahan</td>
            <td>
                <select class="form-select" id="nsm_material" name="nsm_material" style="width: 100%" onclick="getPrice()" required>
                    <option value="" selected>Pilih Jenis Bahan</option>
                    <?php
                    $materials = mysqli_query($connect_w2p, "SELECT * from nsm_material LEFT JOIN nsm_material_category ON nsm_material.material_id = nsm_material_category.id_material_category LEFT JOIN nsm_products ON nsm_products.material_id = nsm_material_category.id_material_category WHERE nsm_products.id = '".$aPath[2]."'");
                    foreach ($materials as $material) {
                        ?>
                    <option value="<?= $material['material_code'] ?>|<?= $material['material_price'] ?>|<?= $material['material_name'] ?>"><?= $material['material_name'] ?></option>
                    <?php } ?>
                </select>
            </td>
            <td id="nsm_harga_bahan">Rp 0</td>
        </tr>

        <tr>
            <td>Finishing</td>
            <td>
                <select name="nsm_finishing" id="nsm_finishing" class="form-select" style="width: 100%" onclick="getPrice()" required>
                    <option value="" selected>Pilih Tipe Finishing</option>
                    <?php
                    $finishing = mysqli_query($connect_w2p, "SELECT * from nsm_finishing LEFT JOIN nsm_finishing_category ON nsm_finishing.finishing_id = nsm_finishing_category.id_finishing_category LEFT JOIN nsm_products ON nsm_products.finishing_id = nsm_finishing_category.id_finishing_category WHERE nsm_products.id = '".$aPath[2]."'");
                    foreach ($finishing as $finish) {
                        ?>
                    <option value="<?= $finish['finishing_code'] ?>|<?= $finish['finishing_price'] ?>|<?= $finish['finishing_name'] ?>"><?= $finish['finishing_name'] ?></option>
                    <?php } ?>
                </select>
            </td>
            <td id="nsm_harga_finishing">Rp 0</td>
        </tr>

        <tr>
            <td>Template</td>
            <td disabled=""></td>
            <td>Gratis</td>
        </tr>

        <tr>
            <td>Total Harga</td>
            <td disabled=""></td>
            <td id="nsm_harga_total">Rp 0</td>
        </tr>

        </tbody>
    </table>
    <!-- note -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="padding-bottom: 5px;"><b class="product-note">Catatan </b> </label>
        <div class="col-sm-12">
            <input class="form-control" value="" name="note" rows="4" id="product_note">
        </div>
    </div>
    <div class="detail-extralink mb-50 mt-30">
        <div class="product-extra-link2">
            <button type="submit" id="submit" name="nsm_editing_start" style="display: none" class="button button-add-to-cart tombol-beli submit"><i class="fi-sr-pencil"></i>Edit Template</button>
            <button type="button" id="not-submit" style="display: block" class="button button-add-to-cart"><i class="fi-sr-pencil"></i>Edit Template</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    function getPrice(e) {
        // show button submit
        var material=document.getElementById("nsm_material").value;
        if (material == "") {
            document.getElementById("not-submit").style.display = 'block';
            document.getElementById("submit").style.display = 'none';
        } else {
            document.getElementById("submit").style.display = 'block';
            document.getElementById("not-submit").style.display = 'none';
            document.getElementById("line_width").style.display = 'block';
        }
        // end show button submit

        // get the data price material
        var get_material = document.getElementById('nsm_material').value;
        var get_price_material = get_material.split("|");
        // end get the data price material

        // get the data price finishing
        var get_finishing = document.getElementById('nsm_finishing').value;
        var get_price_finishing = get_finishing.split("|");
        // end get the data price material

        // get the data size
        var get_size = document.getElementById('nsm_size').value;
        var get_length_width = get_size.split("x");
        var info1 = get_length_width[2];
        var info2 = get_length_width[3];
        // end get the data size

        // total penjumlahan
        const numb_material = get_price_material[1];
        const numb_finisihing = get_price_finishing[1];
        const kali = get_length_width[0] * get_length_width[1] * numb_material + parseInt(numb_finisihing);
        // end total penjumlahan

        // total harga render
        const format = kali.toString().split('').reverse().join('');
        const convert = format.match(/\d{1,3}/g);
        const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('')
        // end total harga render

        // Get Price Material render
        const price_material = get_price_material[1];
        const form_material = price_material.toString().split('').reverse().join('');
        const conv_material = form_material.match(/\d{1,3}/g);
        const price_material_total = 'Rp ' + conv_material.join('.').split('').reverse().join('');
        // End Get Material render

        // Get Price Finishing render
        const price_finishing = get_price_finishing[1];
        const form_finishing = price_finishing.toString().split('').reverse().join('');
        const conv_finishing = form_finishing.match(/\d{1,3}/g);
        const price_finishing_total = 'Rp ' + conv_finishing.join('.').split('').reverse().join('');
        // End Get Finishing render

        document.getElementById("info_width").innerHTML = info1;
        document.getElementById("info_height").innerHTML = info2;

        document.getElementById("nsm_harga_bahan").innerHTML = price_material_total;
        document.getElementById("nsm_harga_finishing").innerHTML = price_finishing_total;
        document.getElementById("nsm_harga_total").innerHTML = rupiah;
        document.getElementById("grand_total_price").value = rupiah;
    }
    document.querySelector("#not-submit").addEventListener('click', function(){
        Swal.fire(
            'Mohon Maaf!',
            'Untuk bisa melakukan "Edit Design", Mohon diisi dulu "Harga Print"',
            'warning'
        )
    });
</script>

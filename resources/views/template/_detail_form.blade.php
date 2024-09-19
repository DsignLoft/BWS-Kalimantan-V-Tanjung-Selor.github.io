<form action="" method="POST" enctype="multipart/form-data" id="formDetail">
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
                    <td>Jenis Bahan</td>
                    <td class="nol">
                        <x-select name="atb1" id="atb1">
                                <option value="test">
                                    Flexi 280 gsm
                                </option>
                        </x-select>
                    </td>
                    <td class="bahan-price text-right"></td>
                </tr>
                    <div class="d-none">
                        <x-select name="atb0" id="atb0">
                            <option value="" selected>test</option>
                        </x-select>
                    </div>
                    <tr>
                        <td>Ukuran</td>
                        <td class="nol">
                            <x-select name="atb0" id="atb0">
                                <option value="" selected>200 x 100 cm</option>
                            </x-select>
                        </td>
                        <td></td>
                    </tr>
            <input type="hidden" name="count" value="1">
            <tr>
                <td>Jumlah Order</td>
                <td class="nol">
                    <x-input type="number" name="qty" id="qty" min="1" value="1" oninput="1" />
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td></td>
                <td class="total-harga text-right"></td>
            </tr>
        </tbody>
    </table>
    <!-- note -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="padding-bottom: 5px;"><b class="product-note">Catatan </b> </label>
        <div class="col-sm-12">
            <x-summernote class="form-control textarea" name="note" rows="4" id="product_note"></x-summernote>
        </div>
    </div>
    <div>
        <label for="term" style="font-size: 14px;">
            <input type="checkbox" name="term" id="term" value="1">
            Saya telah setuju dengan <a href="">syarat dan ketentuan yang berlaku</a>.
        </label>
    </div>
    <div>
        <a id="design-online" class="btn btn-default btn-dark btn-block"><i class="fas fa-pencil"></i> Edit design saya</a>
    </div>
</form>
<script type="text/javascript">
    if (localStorage.getItem('design') != null){
        localStorage.removeItem('design');
    } else {
        if (localStorage.getItem('url') != null && localStorage.getItem('design_json') != null){
            localStorage.removeItem('url');
            localStorage.removeItem('design_json');
        } else {
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
                var pageURL = window.location.href;
                var lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
                localStorage.setItem('design_json', lastURLSegment);
                localStorage.setItem('url', window.location.href);
                window.location.href = "https://indoprinting.co.id/studio?"+maketextnumber(120)+"="+randomtextnumber;
            });
            document.getElementById("link-design").value = localStorage.getItem('design');
            document.getElementById("link-design").innerHTML = localStorage.getItem('design');
        }
    }

</script>

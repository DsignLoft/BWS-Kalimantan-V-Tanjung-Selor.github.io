<div class="payment-bank">
    <table class="table table-bordered">
        <tr>
            <th style="text-align:center;">No. Rekening</th>
            <th>Nama Bank</th>
            <th>Atas Nama</th>
        </tr>
        <tr>
            <td>
                <a href="javascript:void(0);" class="fa fa-copy" onclick="copyToClipboard('#bri')"></a><span id="bri">0083 01 001092 56 5</span>
            </td>
            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_bri.png') }}" alt="" class="img-bank"></td>
            <td>CV. Indoprinting</td>
        </tr>
        <tr>
            <td>
                <a href="javascript:void(0);" class="fa fa-copy" onclick="copyToClipboard('#bni')"></a><span id="bni">5592 09008</span>
            </td>
            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_bni.png') }}" alt="" class="img-bank"></td>
            <td>CV. Indoprinting</td>
        </tr>
        <tr>
            <td>
                <a href="javascript:void(0);" class="fa fa-copy" onclick="copyToClipboard('#mandiri')"></a><span id="mandiri">1360 0005 5532 3</span>
            </td>
            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_mandiri.png') }}" alt="" class="img-bank"></td>
            <td>CV. Indoprinting</td>
        </tr>
        <tr>
            <td>
                <a href="javascript:void(0);" class="fa fa-copy" onclick="copyToClipboard('#bca')"></a><span id="bca">8030 200234</span>
            </td>
            <td class="td-img"><img src="{{ asset('assets/images/logo/logo_bca.png') }}" alt="" class="img-bank"></td>
            <td>Anita Ratnasari</td>
        </tr>
    </table>
</div>

<script>
    function copyToClipboard(element) {
        let text = $(element).text().replace(/\D/g, "");
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(text).select();
        document.execCommand("copy");
        alert('Teks disalin');
        $temp.remove();
    }
</script>
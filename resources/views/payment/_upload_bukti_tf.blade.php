    <!-- Modal upload-->
    <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="uploadFileTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFileTitle"><strong>Unggah bukti pembayaran</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fi-sr-cross"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <ol>
                            <li>File harus berupa gambar dengan ekstensi jpg / png / jpeg.</li>
                            <li>Unggah bukti pembayaran untuk mempercepat proses validasi pembayaran.</li>
                            <li><strong style="color: red;">Penting. Harap unggah bukti transfer sesuai nominal total pembayaran.</strong></li>
                        </ol>
                    </div>
                    <hr>
                    <form action="{{ route('upload.pembayaran') }}" method="POST" enctype="multipart/form-data" id="upload-tf">
                        @csrf
                        <input type="hidden" name="id" value="{{ $order->id_order }}">
                        <input type="hidden" name="phone" value="{{ $order->cust_phone }}">
                        <input type="file" name="bukti_tf" id="unggah">
                        <button type="submit" class="btn btn-info" style="display: none;" id="submit-upload">Unggah</button>
                    </form>
                    <div style="text-align: center;">
                        <img src="{{ url('assets/images/bukti-transfer/' . $order->payment_proof) }}" alt="" id="upload-preview" class="img-upload">
                        <div style="font-size: 10px;display:none;" class="text-upload"><a href="#" class="btn btn-info" id="upload2">upload sekarang</a>.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#upload2').on('click', function() {
                $('#upload-tf').submit();
            });

            $('#upload-tf').on('change', function() {
                $(".text-upload").show();
            });
        });
    </script>

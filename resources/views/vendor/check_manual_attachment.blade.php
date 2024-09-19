@extends('layouts.main')
@section('main')
    @php
        // Connect to database w2p
        $databaseHost = 'localhost';
        $databaseName = 'idp_w2p';
        $databaseUsername = 'idp_w2p';
        $databasePassword = 'Dur14n100$';
        $w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

        $headers[] = 'Authorization: Bearer tikXCBSpl2JGVr49ILhme7dHfbaQuOPFYNozMEc6';
            if (isset($_GET['submit'])) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => 'https://printerp.indoprinting.co.id/api/v1/users',
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => '',
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => 'GET',
                ));
                $check_users = curl_exec($curl);
                curl_close($curl);
                $result_users = json_decode($check_users);
                if ($result_users->error == 0) {
                    foreach ($result_users->users as $user) {
                        if (strpos($user->phone, $_GET['login']) !== false) {
                            $account_erp = $_GET['login'];
                            $insert_checker = mysqli_query($w2p, "SELECT * FROM `nsm_manual_validation` ORDER BY id_validation desc");
                        }
                    }
                }
            }
    @endphp
            <!--End header-->
    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-sr-home mr-5"></i>Beranda</a>
                    > Check Attachment
                </div>
            </div>
        </div>

        @if (isset($_GET['submit']))
            @if($insert_checker->num_rows > 0)
                <p style="color: red">Silahkan tekan tombol (CTRL + F) untuk melakukan pencarian</p>
                <a href="https://indoprinting.co.id/manual-validation-attachment" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                <table class="table table-striped table-bordered mt-20">
                    <thead>
                    <tr>
                        <th scope="col">PIC</th>
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Bukti</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($insert_checker as $lt) { ?>
                    <tr>
                        <th><?= $lt['validation_pic'] ?? 'Fitur Belum Tersedia' ?></th>
                        <th><?= $lt['validation_account'] ?></th>
                        <th><?= rupiah($lt['validation_amount']) ?></th>
                        <td><?= $lt['validation_invoice'] ?></td>
                        <td><?= $lt['validation_note'] ?? 'Tidak ada Catatan' ?></td>
                        <td><?= $lt['validation_date'] ?></td>
                        <td>
                            <a href="#previewValidation" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#previewValidation<?= $lt['id_validation'] ?>">
                                Lihat Bukti Transfer
                            </a>
                            <div class="modal fade" id="previewValidation<?= $lt['id_validation'] ?>" tabindex="-1" aria-labelledby="previewValidationLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="previewValidationLabel">PREVIEW <?= $lt['validation_invoice'] ?></h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?= $lt['validation_attachment'] ?>" class="img-fluid" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <a href="https://indoprinting.co.id/manual-validation-attachment" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
            @else
                <h5 style="text-align: center; margin-top: 10px;">Mohon Maaf, data tidak di temukan</h5>
            @endif
        @endif

        <div class="page-content pt-50 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-12 col-md-12 m-auto">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h2 class="mb-15 mt-15">Check Attachment</h2>
                                    <p class="mb-30">Melakukan pengecekan attachment manual validasi.</p>
                                </div>
                                <form method="get" action="">
                                    <div class="form-group">
                                        <label>Nomor Telepon (Akun PrintERP)</label>
                                        <input type="number" required="" name="login" placeholder="Nomor Telepon Akses PrintERP" />
                                    </div>

                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="submit" id="exampleCheckbox1" value="1" required />
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Klik disini sebelum melakukan pengecekan.</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up">Check Attachment Manual Validasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function () {
            $('#mutation').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
@endsection
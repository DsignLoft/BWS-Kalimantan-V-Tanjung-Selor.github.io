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
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://mutasi.indoprinting.co.id/api/bank_list?status=1',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                $result = json_decode($response);
                $list_bank = $result->data;

                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://mutasi.indoprinting.co.id/api/accounts_list',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $account_info = curl_exec($curl);

                curl_close($curl);
                $result_account = json_decode($account_info);
                $list_account = $result_account->data;

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
                                $account_id  = $_GET['account_id'];
                                $from        = date("Y-m-d", strtotime($_GET['from']));
                                $to          = date("Y-m-d", strtotime($_GET['to']));
                                $amount      = $_GET['amount'];
                                $insert_checker = mysqli_query($w2p, "INSERT INTO `nsm_check_transactions`(`transactions_type`,`transactions_account`,`transactions_bank_name`,`transactions_amount`,`transactions_from_date`,`transactions_to_date`) VALUES ('Check Transfer','$account_erp','$account_id','$amount','$from','$to')");

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => "https://mutasi.indoprinting.co.id/api/search_transactions?account_id=$account_id&from=$from&to=$to&amount=$amount&type=C",
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_HTTPHEADER => $headers,
                                  CURLOPT_ENCODING => '',
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 0,
                                  CURLOPT_FOLLOWLOCATION => true,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => 'GET',
                                ));
                                $transactions = curl_exec($curl);
                                curl_close($curl);
                                $out_data_transactions = json_decode($transactions);
                            }
                        }
                    }
                }

                if (isset($_GET['submit_mutation'])) {
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
                            if (strpos($user->phone, $_GET['login_mutation']) !== false) {
                                $account_erp      = $_GET['login_mutation'];
                                $account_mutation = $_GET['account_mutation'];
                                $from_mutation    = date("Y-m-d", strtotime($_GET['from_mutation']));
                                $to_mutation      = date("Y-m-d", strtotime($_GET['to_mutation']));
                                $insert_checker = mysqli_query($w2p, "INSERT INTO `nsm_check_transactions`(`transactions_type`,`transactions_account`,`transactions_bank_name`,`transactions_from_date`,`transactions_to_date`) VALUES ('Check Mutasi','$account_erp','$account_mutation','$from_mutation','$to_mutation')");

                                $curl = curl_init();
                                curl_setopt_array($curl, array(
                                   CURLOPT_URL => "https://mutasi.indoprinting.co.id/api/transactions?account_id=$account_mutation&from=$from_mutation&to=$to_mutation",
                                   CURLOPT_RETURNTRANSFER => true,
                                   CURLOPT_HTTPHEADER => $headers,
                                   CURLOPT_ENCODING => '',
                                   CURLOPT_MAXREDIRS => 10,
                                   CURLOPT_TIMEOUT => 0,
                                   CURLOPT_FOLLOWLOCATION => true,
                                   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                   CURLOPT_CUSTOMREQUEST => 'GET',
                                 ));
                                $mutation_info = curl_exec($curl);
                                curl_close($curl);
                                $out_data_mutation = json_decode($mutation_info);
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
                    > Check Transfer
                </div>
            </div>
        </div>

        @if (isset($_GET['submit']))
            @if(!empty($out_data_transactions))
                @if($out_data_transactions->status == true)
                    @php $list_transactions = $out_data_transactions->data; @endphp
                    <p style="color: red">Silahkan tekan tombol (CTRL + F) untuk melakukan pencarian</p>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                    <table class="table table-striped table-bordered mt-20">
                        <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Validasi Otomatis</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_transactions as $lt) { ?>
                        <tr>
                            <th><?= $lt->dates ?></th>
                            <th><?= $lt->created_at ?></th>
                            <td><?= $lt->bank_name ?></td>
                            <td><?= rupiah($lt->credit) ?></td>
                            <td><?= $lt->from_name ?></td>
                            <td><?= $lt->description ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                @else
                    <table class="table table-striped table-bordered mt-20">
                        <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Validasi Otomatis</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Data Tidak Ditemukan</th>
                            <th>Data Tidak Ditemukan</th>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                @endif
            @else
                <h1 style="text-align: center;">Mohon Maaf, anda tidak memiliki akses untuk melakukan pengecekan</h1>
            @endif
        @endif

        @if (isset($_GET['submit_mutation']))
            @if(!empty($out_data_mutation))
                @if($out_data_mutation->status == true)
                    @php $list_mutation = $out_data_mutation->data; @endphp
                    <p style="color: red">Silahkan tekan tombol (CTRL + F) untuk melakukan pencarian</p>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                    <table class="table table-striped table-bordered mt-20">
                        <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Validasi Otomatis</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">No. Rek</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_mutation as $lm) { ?>
                        <tr>
                            <th><?= $lm->dates ?></th>
                            <th><?= $lm->created_at ?></th>
                            <td><?= $lm->bank_name ?></td>
                            <td><?= rupiah($lm->credit) ?></td>
                            <td><?= $lm->account_number ?></td>
                            <td><?= $lm->description ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                @else
                    <table class="table mt-20">
                        <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Validasi Otomatis</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">No. Rek</th>
                            <th scope="col">Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Data Tidak Ditemukan</th>
                            <th>Data Tidak Ditemukan</th>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                            <td>Data Tidak Ditemukan</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="https://indoprinting.co.id/check-transactions" class="btn btn-success btn-block"><i class="fi-sr-refresh"></i> Reset Pencarian</a>
                @endif
            @else
                <h1 style="text-align: center;">Mohon Maaf, anda tidak memiliki akses untuk melakukan pengecekan</h1>
            @endif
        @endif

        <div class="page-content pt-50 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <img class="border-radius-15" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/page/forgot_password.svg" alt="Check Transaksi Masuk Indoprinting Semarang Indonesia" />
                                    <h2 class="mb-15 mt-15">Check Transfer</h2>
                                    <p class="mb-30">Melakukan pengecekan untuk mencari transaksi berdasarkan nominal nya. Ini berguna jika anda ingin mencari pembayaran menggunakan kode unik.</p>
                                </div>
                                <form method="get" action="">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select class="form-control" name="account_id">
                                            <?php foreach ($list_account as $la) { ?>
                                            <option value="<?= $la->id ?>"><?= $la->account_number ?> - <?= $la->bank_name ?> - <?= $la->account_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <input type="date" required="" name="from" />
                                    </div>
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="date" required="" name="to" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nominal</label>
                                        <input type="number" required="" name="amount" placeholder="1000000" />
                                    </div>
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
                                        <button type="submit" class="btn btn-heading btn-block hover-up">Check Daftar Transfer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 m-auto">
                        <div class="login_wrap widget-taber-content background-white">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <img class="border-radius-15" src="https://assets.javtore.com/indoprinting-new/frontend/assets/imgs/page/reset_password.svg" alt="Check Mutasi Masuk Indoprinting Semarang Indonesia" />
                                    <h2 class="mb-15 mt-15">Check Mutasi</h2>
                                    <p class="mb-30">Melakukan pengecekan daftar mutasi pada rentang tanggal tertentu. Ini berguna jika anda ingin mencari seluruh daftar transaksi masuk sesuai rentang tanggal.</p>
                                </div>
                                <form method="get" action="">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select class="form-control" name="account_mutation">
                                            <?php foreach ($list_account as $la) { ?>
                                            <option value="<?= $la->id ?>"><?= $la->account_number ?> - <?= $la->bank_name ?> - <?= $la->account_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Dari Tanggal</label>
                                        <input type="date" required="" name="from_mutation" />
                                    </div>
                                    <div class="form-group">
                                        <label>Sampai Tanggal</label>
                                        <input type="date" required="" name="to_mutation" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Telepon (Akun PrintERP)</label>
                                        <input type="number" required="" name="login_mutation" placeholder="Nomor Telepon Akses PrintERP" />
                                    </div>

                                    <div class="login_footer form-group mb-50">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="submit_mutation" id="exampleCheckbox2" value="1" required />
                                                <label class="form-check-label" for="exampleCheckbox2"><span>Klik disini sebelum melakukan pengecekan.</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-heading btn-block hover-up">Check Daftar Mutasi</button>
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
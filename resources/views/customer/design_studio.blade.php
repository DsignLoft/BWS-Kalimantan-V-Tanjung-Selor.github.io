@extends('layouts.profile')
@section('profile')
    <x-alert />
    <div class="text-center">
        @php
            $databaseHost = 'localhost';
            $databaseName = 'idp_w2p';
            $databaseUsername = 'idp_w2p';
            $databasePassword = 'Dur14n100$';
            $w2p = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
            $invoice_studio = mysqli_query($w2p, "SELECT * FROM idp_invoice_studio LEFT JOIN nsm_orders ON idp_invoice_studio.invoice_id = nsm_orders.id WHERE idp_invoice_studio.customer_id = '".$_COOKIE['nsm_session_idp']."' ORDER BY idp_invoice_studio.id_invoice desc");
        @endphp
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">No Invoice</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Dibuat</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($invoice_studio as $studio) { ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td>
                    <a href="https://studio.indoprinting.co.id/success?order_id=<?= $studio['id'] ?>" target="_blank"><?= $studio['no_invoice'] ?></a>
                </td>
                <td><?= $studio['total'] ?></td>
                <td>
                        <?php if ($studio['status'] == 'pending') { ?>
                    <span class="badge badge-warning">Pending</span>
                    <?php } ?>
                        <?php if ($studio['status'] == 'proses') { ?>
                    <span class="badge badge-warning">Proses</span>
                    <?php } ?>
                        <?php if ($studio['status'] == 'preparing') { ?>
                    <span class="badge badge-warning">Preparing</span>
                    <?php } ?>
                        <?php if ($studio['status'] == 'waiting') { ?>
                    <span class="badge badge-warning">Waiting</span>
                    <?php } ?>
                        <?php if ($studio['status'] == 'complate') { ?>
                    <span class="badge badge-primary">Complate</span>
                    <?php } ?>
                        <?php if ($studio['status'] == 'finish') { ?>
                    <span class="badge badge-success">Finish</span>
                    <?php } ?>

                </td>
                <td><?= $studio['created'] ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
@endsection
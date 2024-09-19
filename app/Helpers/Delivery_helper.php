<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

function estimasiDelivery($etd, $target)
{
    $day = strlen($etd == 1) ? $etd : explode('-', $etd)[1];
    return  date('Y-m-d H:i:s', strtotime(date($target) . "+ $day days"));
}

function waBeforePaid($invoice, $phone, $name)
{

    $api    = Http::withToken('gWC4p3Kr3V15ImUlUd4R1DuLu94kK3l4rkELaR')->baseUrl("https://api.indoprinting.co.id/v1/");
    if (DB::table('adm_wa_rapiwha')->where('phone', $phone)->doesntExist()) :
        $tgl_exp    = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 1days'));
        $tgl_exp    = dateTimeID($tgl_exp);
        $wa_phone   = set62($phone);
        $message    = "Halo kak *{$name}* \r\n\r\nPesanan berhasil dibuat dengan no. invoice *{$invoice}*.\r\n\r\nSilahkan lanjutkan pembayaran sebelum *{$tgl_exp}* \r\n\r\nPantau Status Orderan kaka (produksi sd pengiriman) \r\ndengan klik tautan berikut : \r\n*https://indoprinting.co.id/trackorder?invoice={$invoice}*.\r\n\r\nTerimakasih, \r\nindoprinting.co.id \r\n\r\n#PesanOtomatis";
        return $api->asForm()->post("whatsapp/send", ['phone' => $wa_phone, 'message' => $message])->body();
    endif;
    return false;
}

function waReset($id_customer, $phone, $name)
{

    $api    = Http::withToken('gWC4p3Kr3V15ImUlUd4R1DuLu94kK3l4rkELaR')->baseUrl("https://api.indoprinting.co.id/v1/");
    $pin        = mt_rand(111111, 999999);
    User::where('id_customer', $id_customer)->update(['token' => $pin]);
    $wa_phone   = set62($phone);
    $message    = "Halo kak *{$name}*.\r\nBerikut PIN untuk reset password *{$pin}*.\r\n\r\nTerimakasih, \r\nindoprinting.co.id  \r\n\r\n#PesanOtomatis";
    return $api->asForm()->post("whatsapp/send", ['phone' => $wa_phone, 'message' => $message])->body();
}

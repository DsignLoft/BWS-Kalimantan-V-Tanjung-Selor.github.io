<?php

use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use App\Models\Product\CategoryProduct;

function adminUrl($path)
{
    return "https://admin.indoprinting.co.id/{$path}";
}

function cacheTime()
{
    return 60 * 60 * 1; // 1 hour
}

function rupiah($angka)
{
    if ($angka == null || $angka == '') {
        $angka = 0;
    }
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function soldThousand($sold_out)
{
    if ($sold_out > 999) :
        $sold_out = $sold_out / 1000;
        $sold_out = $sold_out % 100 == 0 ? $sold_out : round($sold_out, 2);
        $sold_out = str_replace(".", ",", $sold_out);
        $sold_out = $sold_out . " rb";
    endif;
    return $sold_out;
}

function set62($phone)
{
    if (substr(trim($phone), 0, 1) == 0) :
        return "62" . substr($phone, 1);
    elseif (substr(trim($phone), 0, 3) == '+62') :
        return $phone;
    elseif (substr(trim($phone), 0, 2) == '62') :
        return "+$phone";
    endif;
}
function category_topbar()
{
    return cache()->remember('category-topbar', 60 * 60 * 24 * 7, function () {
        return CategoryProduct::orderBy('order_by', 'asc')->get();
    });
}

function visitor()
{
    $agent = new Agent();
    $user_ip        = request()->ip();
    if (DB::table('idp_visitor')->where('ip_address', $user_ip)->exists()) {
        return false;
    }
    $data           = [
        'ip_address'    => $user_ip,
        'is_mobile'     => rand(0, 1),
        'mobile_name'   => '',
        'browser_name'  => $agent->browser(),
        'user_agent'    => request()->userAgent(),
        'platform'      => $agent->platform(),
        'country'       => "",
        'province'      => "",
        'city'          => "",
        'created_at'    => date('Y-m-d'),
    ];
    return DB::table('idp_visitor')->insert($data);
}

function visitorToday()
{
    $agent = new Agent();
    $user_ip        = request()->ip();
    $data           = [
        'ip_address'    => $user_ip,
        'is_mobile'     => rand(0, 1),
        'mobile_name'   => '',
        'browser_name'  => $agent->browser(),
        'user_agent'    => request()->userAgent(),
        'platform'      => $agent->platform(),
        'country'       => "",
        'province'      => "",
        'city'          => "",
        'created_at'    => date('Y-m-d'),
    ];
    return DB::table('idp_visitor_today')->insert($data);
}

function visitorTomorrow()
{
    $agent      = new Agent();
    $user_ip    = request()->ip();
    $data       = [
        'ip_address'    => $user_ip,
        'is_mobile'     => rand(0, 1),
        'mobile_name'   => '',
        'browser_name'  => $agent->browser(),
        'user_agent'    => request()->userAgent(),
        'platform'      => $agent->platform(),
        'country'       => "",
        'province'      => "",
        'city'          => "",
        'created_at'    => Carbon::now()->subDays(1),
    ];
    return DB::table('idp_visitor_today')->insert($data);
}

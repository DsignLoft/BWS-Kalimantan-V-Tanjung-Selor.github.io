<?php

use Illuminate\Support\Facades\DB;

setlocale(LC_ALL, 'id-ID', 'id_ID');

function myDate($date)
{
    return date("d-m-Y", strtotime($date));
}

function dateTime($date)
{
    return date("d-m-Y H:i:s", strtotime($date));
}

function dateID($date)
{
    return strftime("%A, %d %B %Y", strtotime($date));
}

function dateID2($date)
{
    return strftime("%A, %d %b %Y", strtotime($date));
}

function dateTimeID($date)
{
    return strftime("%A, %d %B %Y %H:%M", strtotime($date));
}

function dateTimeID2($date)
{
    return strftime("%A, %d %b %y %H:%M", strtotime($date));
}

function storeError($location, $detail, $messages)
{
    return DB::table('adm_error_report')->insert([
        'location'  => $location,
        'detail'    => $detail,
        'messages'  => $messages,
        'created_at'    => date('Y-m-d H:i:s')
    ]);
}

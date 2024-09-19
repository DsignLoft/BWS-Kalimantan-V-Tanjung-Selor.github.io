<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'idp_orders';
    protected $primaryKey = 'id_order';
    protected $guarded  = ['id_order'];
    protected $fillable = [
        'no_inv',
        'cust_id',
        'cust_name',
        'address',
        'total',
        'items',
        'pickup',
        'cust_phone',
        'cust_email',
        'pickup_method',
        'payment_method',
        'url_track_order',
        'sale_status',
        'cs',
        'created_at',
        'updated_at'
    ];
}
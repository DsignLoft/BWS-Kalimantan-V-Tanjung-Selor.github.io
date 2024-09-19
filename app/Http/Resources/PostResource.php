<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id_order'          => $this->id_order,
            'no_inv'            => $this->no_inv,
            'cust_id'           => $this->cust_id,
            'cust_name'         => $this->cust_name,
            'address'           => $this->address,
            'total'             => $this->total,
            'items'             => $this->items,
            'pickup'            => $this->pickup,
            'cust_phone'        => $this->cust_phone,
            'cust_email'        => $this->cust_email,
            'pickup_method'     => $this->pickup_method,
            'payment_method'    => $this->payment_method,
            'url_track_order'   => $this->url_track_order,
            'sale_status'       => $this->sale_status,
            'cs'                => $this->cs,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at
        ];
    }
}
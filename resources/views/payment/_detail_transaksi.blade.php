<!-- Modal detail-->
<div class="modal fade" id="paymentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="paymentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalTitle"><strong>Detail pembayaran</strong></h5>
                <button type="button" class="close" id="close-detail" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times-square"></i>
                </button>
            </div>
            <div class="modal-body">
                @if(!intval($order['items']))
                    <div class="payment-detail">
                        <div>Status Pembayaran<span class="float-right" id="payment-status"><?= $sale_erp->sale->payment_status ?></span></div>
                        <div>No. Invoice<span class="float-right"><?= $order['no_inv'] ?></span></div>
                        <div>Nama Pelanggan<span class="float-right"><?= $order['cust_name'] ?></span></div>
{{--                        <div>Catatan<span class="float-right"><?= $order['notes'] ?? 'Tidak ada catatan' ?></span></div>--}}
                        <hr>
                        @foreach (json_decode($order->items) as $item)
                            <div>{{ $item->name }}</div>
                            <div class="qty">Kuantitas : {{ $item->qty }}<span class="float-right">{{ rupiah($item->price) }}</span></div>
                            @foreach (json_decode($item->attributes)->jenis_atb as $id_atb => $name)
                                <p class="atb"><strong>{{ $name }}</strong> : {{ json_decode($item->attributes)->nama_atb[$id_atb] }}</p>
                            @endforeach
                            <p class="atb"><strong>Catatan</strong> : {{ $item->product_note ?? 'Tidak ada catatan' }}</p>
                        @endforeach
                        <hr>
                        <div>Sub total<span class="float-right">{{ rupiah($order->total) }}</span></div>
                        @isset($harga_kurir)
                            <div>Ongkir<span class="float-right">{{ rupiah($harga_kurir) }}</span></div>
                        @endisset
                        @isset($sale_erp->payment_validation->unique_code)
                            <div>Kode unik<span class="float-right">{{ $sale_erp->payment_validation->unique_code }}</span></div>
                        @endisset

                        @if($order->dp_status == 'pending')
                            @if($order->total_dp != 0)
                                @php
                                    $total_transfer = $sale_erp->payment_validation->transfer_amount;
                                    $total_payment = $total_transfer;
                                    $total_utang = $order->total - $total_transfer + $sale_erp->payment_validation->unique_code;
                                @endphp
                                <div style="color: red">DP<span class="float-right">{{ rupiah($total_payment) }}</span></div>
                                <div style="color: red">Utang<span class="float-right">{{ rupiah($total_utang) }}</span></div>
                            @endif
                        @elseif($order->dp_status == 'complete')
                            @php
                                $total_transfer = $sale_erp->payment_validation->transfer_amount;
                                $total_pelunasan = $order->total - $total_transfer + $sale_erp->payment_validation->unique_code;
                            @endphp
                            <div style="color: green">DP<span class="float-right">{{ rupiah($total_transfer) }}</span></div>
                            <div style="color: green">Pelunasan<span class="float-right">{{ rupiah($total_pelunasan) }}</span></div>
                        @endif

                        @if($order->no_inv != null)
                            @php
                                $total_discount = $order->discount;
                                $get_transfer   = $sale_erp->payment_validation->transfer_amount ?? $sale_erp->sale->grand_total;
                                $total_transfer = $get_transfer - $total_discount;
                            @endphp
                            <div style="color: red">Discount<span class="float-right">{{ rupiah($total_discount) }}</span></div>
                        @endif
                        <hr>
                        <div>
                            <strong>Total pembayaran</strong>
                            <span class="float-right">
                                <strong style="color:orangered;">
                                    @if($order->dp_status == 'pending')
                                        @if($order->total_dp != 0)
                                            @php
                                                $total_transfer = $sale_erp->payment_validation->transfer_amount ?? $sale_erp->sale->grand_total;
                                                $total_payment = $total_transfer
                                            @endphp
                                            {{ rupiah($total_payment) }}
                                        @endif
                                    @elseif($order->dp_status == 'complete')
                                        @php
                                            $total_pelunasan = $order->total + $sale_erp->payment_validation->unique_code;
                                        @endphp
                                        {{ rupiah($total_pelunasan) }}
                                    @else
                                        {{ rupiah($sale_erp->payment_validation->transfer_amount ?? $sale_erp->sale->grand_total) }}
                                    @endif
                                </strong>
                            </span>
                        </div>

                    </div>
                @else
                        <?php
                        $design_id = $_SERVER["REQUEST_URI"];
                        $no_invoice = $_GET['invoice'];
                        $customer_phone = $_GET['phone'];
                        $database = \Illuminate\Support\Facades\DB::table('idp_orders')
                            ->join('nsm_order_products', 'nsm_order_products.id', '=', 'idp_orders.items')
                            ->join('nsm_orders', 'nsm_orders.id', '=', 'nsm_order_products.order_id')
                            ->join('nsm_guests', 'nsm_guests.id', '=', 'nsm_orders.user_id')
                            ->where('idp_orders.no_inv', $no_invoice)
                            ->where('idp_orders.cust_phone', $customer_phone)
                            ->get()
                        ;
                        ?>
                    @foreach ($database as $data)
                            <?php
                            $invoices = \Illuminate\Support\Facades\DB::table('nsm_order_products')
                                ->join('nsm_orders', 'nsm_orders.id', '=', 'nsm_order_products.order_id')
                                ->join('nsm_guests', 'nsm_guests.id', '=', 'nsm_orders.user_id')
                                ->where('nsm_order_products.order_id', $data->order_id)
                                ->get()
                            ;
                            ?>
                        <div class="payment-detail">
                            <div>Status Pembayaran<span class="float-right" id="payment-status"><?= $data->payment_status ?></span></div>
                            <div>No. Invoice<span class="float-right"><?= $data->no_inv ?></span></div>
                            <div>Nama Pelanggan<span class="float-right"><?= $data->cust_name ?></span></div>
                            <hr>
                            @foreach ($invoices as $invoice)
                                <div>{{ $invoice->product_name }}</div>
                                <div class="qty">Kuantitas : {{ $invoice->qty }}<span class="float-right">{{ rupiah($invoice->product_price) }}</span></div>
                                    <?php $data_obj = json_decode(rawurldecode(base64_decode($invoice->data))) ?>
                                @if (isset($data_obj->attributes))
                                    @foreach($data_obj->attributes as $id => $attr)
                                        @if(is_object($attr) && isset($attr->name))
                                            @if(isset($attr->value))
                                                @if($attr->type == 'color' || $attr->type == 'product_color')
                                                    <span style="margin-left: 10px"><strong>{{$attr->name}}:</strong></span>
                                                        <?php $col = $attr->value ?>
                                                    @if(is_object($attr->values) && is_array($attr->values->options))
                                                        @foreach($attr->values->options as $op)
                                                            @if($op->value == $attr->value)
                                                                    <?php $col = htmlentities($op->title) ?>
                                                                <p class="atb"><strong>{{ htmlentities($attr->value) }}</strong> : {{ $col }}</p>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @else
                                                <p class="atb"><strong>Sesuaikan dengan design</strong></p>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <hr>
                            <div>Sub total<span class="float-right">{{ rupiah($order->total) }}</span></div>
                            @isset($harga_kurir)
                                <div>Ongkir<span class="float-right">{{ rupiah($harga_kurir) }}</span></div>
                            @endisset
                            @isset($sale_erp->payment_validation->unique_code)
                                <div>Kode unik<span class="float-right">{{ $sale_erp->payment_validation->unique_code }}</span></div>
                            @endisset
                            <hr>
                            <div><strong>Total pembayaran</strong>
                                <span class="float-right">
                            <strong style="color:orangered;">{{ rupiah($sale_erp->payment_validation->transfer_amount ?? $sale_erp->sale->grand_total) }}</strong>
                        </span>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function() {
        $("#close-detail").on('click', function() {
            location.reload();
        });
    });
</script> --}}

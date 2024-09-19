@php
$time = date('Y-m-d H:i:s', strtotime($order->created_at . ' + 1days'));
$payment_status = $sale_erp->sale->payment_status;
@endphp
<div class="payment-head">
    <h4>Batas akhir pembayaran</h4>
    <h5>{{ dateTimeID($time) }}</h5>
    @if ($payment_status == "Expired")
    <p style="font-size: 22px;font-style:italic;color:red">{{ $payment_status }}</p>
    @elseif($payment_status == "Paid")
    <p style="font-size: 22px;font-style:italic;color:green">{{ $payment_status }}</p>
    @endif
</div>

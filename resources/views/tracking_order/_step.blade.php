<div class="step">
    <ul class="progressbar">
        @php $status = $sale->status @endphp
        @if ($status == 'Need Payment')
            <li class="active">Need Payment</li>
            <li>Waiting production</li>
            <li>Completed</li>
            <li>Finished / Ready to Pickup</li>
            <li>Delivered</li>
        @elseif (in_array($status, ['Preparing', 'Waiting Production', 'Completed Partial']))
            <li class="active">Need Payment</li>
            <li class="active">Waiting production</li>
            <li>Completed</li>
            <li>Finished / Ready to Pickup</li>
            <li>Delivered</li>
        @elseif ($status == 'Completed')
            <li class="active">Need Payment</li>
            <li class="active">Waiting production</li>
            <li class="active">Completed</li>
            <li>Finished / Ready to Pickup</li>
            <li>Delivered</li>
        @elseif ($status == 'Finished')
            <li class="active">Need Payment</li>
            <li class="active">Waiting production</li>
            <li class="active">Completed</li>
            <li class="active">Finished / Ready to Pickup</li>
            <li>Delivered</li>
        @elseif ($status == 'Delivered')
            <li class="active">Need Payment</li>
            <li class="active">Waiting production</li>
            <li class="active">Completed</li>
            <li class="active">Finished / Ready to Pickup</li>
            <li class="active">Delivered</li>
        @endif
    </ul>
</div>

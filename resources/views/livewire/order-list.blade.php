<div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th width="20px">No.</th>
                <th>Nama Pembeli</th>
                <th>Nama Penjual</th>
                <th>Tanggal Penjualan</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @php
                $key = 1
            @endphp
            @if (count($orders)>0)
            @foreach ($orders as $order)
            <tr>
                <td>{{$key++}}</td>
                @if ($order->buyer == NULL)
                    <td>No Indetification Buyer</td>
                @else
                    <td>{{$order->buyer}}</td>
                @endif
                @if ($order->seller == NULL)
                    <td>No Indetification Seller</td>
                @else
                    <td>{{$order->seller}}</td>
                @endif
                <td>{{$order->created_at}}</td>
                <td>
                    <button class="btn btn-success" wire:click="receiptPDF({{$order->id}})"><i class="bi bi-box-arrow-in-down"></i></button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Orders Created</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{-- The Master doesn't talk, he acts. --}}
</div>

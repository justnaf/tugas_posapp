<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #invoice-POS {
            padding: 2mm;
            margin: 0;
            width: 44mm;
        }
        p{
            margin: 0
        }
        h2{
            margin: 0
        }
    </style>
    @livewireStyles
</head>

<body style="color: black">
    <div id="invoice-POS">
        <center>
            <div>
                <h3 style="font-size: 12pt;margin:0">Receipt Pembelian</h3>
                @if ($seller == NULL)
                <p style="font-size: 8pt;margin:0 ">{{$orderhead_stamp}} / Toko Jaya Makmur / Anonim Seller</p>
                @else
                <p style="font-size: 8pt;margin:0 ">{{$orderhead_stamp}} / Toko Jaya Makmur / {{$seller}}</p>
                @endif
            </div>
            <div>
                <h3 style="font-size: 6pt;margin:0;margin-top:10px">Contact Info:</h3>
                <p style="font-size: 5pt;margin:0 ">UNIMMA / 20.0504.0014 / Naufal Anis Fauzan</p>

            </div>
        </center>
        <!--End InvoiceTop-->
        <!--End Invoice Mid-->
        <center>
            <table style="font-size: 6pt;margin-top:20px;margin-bottom:20px;margin-left:0;margin-right:0;"  width="100%">
                <tr>
                    <td style="text-align: center">
                        <h2>Item</h2>
                    </td>
                    <td style="text-align: center">
                        <h2>Qty</h2>
                    </td>
                    <td style="text-align: end">
                        <h2>Sub Total</h2>
                    </td>
                </tr>
                @foreach ($detail as $item)
                <tr>
                    <td style="text-align: center">
                        <p>{{$item['name']}}</p>
                    </td>
                    <td style="text-align: center">
                        <p>{{$item['qty'] . " Pcs"}}</p>
                    </td>
                    <td style="text-align:end">
                        <p>{{"Rp ".number_format($item['subtotal'],0,',','.')}}</p>
                    </td>
                </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td style="text-align: end">
                        <h2>Total</h2>
                    </td>
                    <td style="font-size: 5pt;text-align:end">
                        <h2>{{"Rp ".number_format($total,0,',','.')}}</h2>
                    </td>
                </tr>

            </table>
        </center>
            <!--End Table-->

            <center>
                <div style="font-size: 6pt">
                    <p class="legal"><strong>Terima Kasih Sudah Membeli!</strong>
                    @if ($buyer == NULL)
                    <p class="legal"><strong>{{$orderhead_stamp}} / Anonim</strong>
                    @else
                    <p class="legal"><strong>{{$orderhead_stamp . " / " .$buyer}}</strong>
                    @endif
                    </p>
                </div>
            </center>

    @livewireScripts
</body>

</html>

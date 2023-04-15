<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;


            ::selection {
                background: #f31544;
                color: #FFF;
            }

            ::moz-selection {
                background: #f31544;
                color: #FFF;
            }
        }

        h1 {
            font-size: 1.5em;
            color: #222;
        }

        h2 {
            font-size: .9em;
        }

        h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #top,
        #mid,
        #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #top {
            min-height: 100px;
        }

        #mid {
            min-height: 80px;
        }

        #bot {
            min-height: 50px;
        }

        #top .logo {
            //float: left;
            height: 60px;
            width: 60px;
            background: url(https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png) no-repeat;
            background-size: 60px 60px;
        }

        .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        .info {
            display: block;
            //float:left;
            margin-left: 0;
        }

        .title {
            float: right;
        }

        .title p {
            text-align: right;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            //padding: 5px 0 5px 15px;
            //border: 1px solid #EEE
        }

        .tabletitle {
            //padding: 5px;
            font-size: .5em;
            background: #EEE;
        }

        .service {
            border-bottom: 1px solid #EEE;
        }

        .item {
            width: 24mm;
        }

        .itemtext {
            font-size: .5em;
        }

        #legalcopy {
            margin-top: 5mm;
        }
    </style>
</head>

<body>
    <div id="invoice-POS">

        <center id="top">
            <div class="logo"></div>
            <div class="info">
                <h2>Tugas Buat POS APP</h2>
            </div>
            <!--End Info-->
        </center>
        <!--End InvoiceTop-->

        <div id="mid">
            <div class="info">
                <h2>Contact Info</h2>
                <table style="color: #666;
                line-height: 1.2em; font-size:7pt;">
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>UNIMMA</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>204050014@student.unimma.ac.id</td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td>20.0504.0014</td>
                    </tr>
                </table>
            </div>
        </div>
        <!--End Invoice Mid-->

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="Hours">
                            <h2>Qty</h2>
                        </td>
                        <td class="Rate">
                            <h2>Sub Total</h2>
                        </td>
                    </tr>

                    @php
                        $total = 0
                    @endphp
                    @foreach ($data as $item)
                    <tr class="service">
                        <td class="tableitem">
                            <p class="itemtext">{{$item->products->name}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{$item->qty}}</p>
                        </td>
                        <td class="tableitem">
                            <p class="itemtext">{{$item->subtotal}}</p>
                        </td>
                    </tr>
                    @php
                        $total+= $item->subtotal;
                    @endphp
                    @endforeach

                    <tr class="tabletitle">
                        <td></td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2>{{$total}}</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <!--End Table-->

            <center>
                <div id="legalcopy">
                    <p class="legal"><strong>Terima Kasih Sudah Membeli!</strong>
                    </p>
                </div>
            </center>

        </div>
        <!--End InvoiceBot-->
    </div>
    <!--End Invoice-->
</body>

</html>

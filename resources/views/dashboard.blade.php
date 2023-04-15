@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="card border-0 shadow shadow-lg">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Pembelian</h3>
                        <p>Jumlah : {{count($buys)}}</p>
                        <p>Data Akhir : <b>{{$buys->last()->created_at}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3>Penjualan</h3>
                        <p>Jumlah : {{count($sells)}}</p>
                        <p>Data Terakhir : <b>{{$sells->last()->created_at}}</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col"><div class="card">
                <div class="card-body">
                    <h3>Persediaan</h3>
                    <table class="table" style="width:50%">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sedia as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

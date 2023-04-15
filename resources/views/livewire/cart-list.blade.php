<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" wire:click="addCart()">
        Tambah Cart
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Ke Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <select class="form-select" aria-label="Default select example" wire:model="products_id">
                                <option selected>-- Select Your Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" wire:model="qty">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" wire:click.prevent='storeCart()' data-bs-dismiss="modal">Add Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form>
    <div class="row mb-3">
        <div class="col-3">
            <input type="text" class="form-control" placeholder="Pembeli" wire:model="buyer">
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <th width="5%">No.</th>
                <th width="30%">Nama Barang</th>
                <th width="25%" class="text-center">Quantity</th>
                <th width="40" class="text-center">Subtotal</th>
                <th width="40" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $key = 1;
                $total = 0;
            @endphp
            @if (count($carts) > 0)
                @foreach ($carts as $cart)
                    @php
                        $subtotal = $cart->products->price * $cart->qty;
                    @endphp
                    <tr>
                        <td>{{ $key++ }}</td>
                        <td>{{ $cart->products->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-4 text-center"><button class="btn btn-success" wire:click="upQty({{$cart->id}})">+</button></div>
                                <div class="col-4 text-center p-2">
                                    {{$cart->qty}}
                                </div>
                                <div class="col-4 text-center"><button class="btn btn-danger" wire:click="downQty({{$cart->id}})">-</button></div>
                            </div>
                        </td>
                        <td class="text-end pe-3 fw-bold">{{"Rp. ". number_format($subtotal,0,",",".") }}</td>
                        <td class="text-center"><button class="btn btn-danger" wire:click="deleteCart({{$cart->id}})"><i class="bi bi-trash"></i></button></td>
                    </tr>
                    @php
                        $total+= $subtotal;
                    @endphp
                @endforeach
            @else
                <tr>
                    <td colspan="5" align="center">Cart Is Empty</td>
                </tr>
            @endif
        </tbody>
        <tfoot class="table-dark">
            <tr>
                <td colspan="3" class="fw-bold">Grand Total</td>
                <td class="text-end fw-bold pe-3">{{"Rp. ".number_format($total,0,",",".")}}</td>
                <td class="text-end"></td>
            </tr>
        </tfoot>
    </table>
    <button class="btn btn-danger" wire:click.prevent="deleteAllCart()">Clear Cart</button>
    <button class="btn btn-success" wire:click.prevent="checkout()">Checkout</button>
</form>
</div>

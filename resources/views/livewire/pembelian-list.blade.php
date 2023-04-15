<div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click="addBuy()">
            Tambah Pembelian
        </button>

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="cancelBuy()"></button>
                    </div>
                    <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <select class="form-select" aria-label="Default select example" wire:model="products_id">
                                <option selected>-- Select Your Product --</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                              </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" wire:model="price">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="exampleInputPassword2" wire:model="qty">
                          </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal" wire:click.prevent="cancelBuy()">Close</button>
                        <button type="button" class="btn btn-success" wire:click.prevent='storeBuy()'  data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        @include('livewire.flash')
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th width="20px">No.</th>
                    <th>Timestamp</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $key = 1
                @endphp
                @if (count($buys)>0)
                @foreach ($buys as $buy)
                <tr>
                    <td>{{$key++}}</td>
                    <td>{{$buy->created_at}}</td>
                    @if ($buy->products_id == NULL)
                        <td>No Items</td>
                        @else
                        <td>{{$buy->products->name}}</td>
                    @endif
                    <td>{{"Rp. ".number_format($buy->price,0,",",".")}}</td>
                    <td>{{$buy->qty}}</td>
                    @php
                        $subtotal = $buy->price * $buy->qty;
                    @endphp
                    <td>{{"Rp. ". number_format($subtotal,0,",",".")}}</td>
                    <td><button class="btn btn-danger" wire:click="deleteBuy({{$buy->id}})"><i class="bi bi-trash"></i></button></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" align="center">No Pembelian Found</td>
                </tr>
                @endif
            </tbody>
        </table>
</div>

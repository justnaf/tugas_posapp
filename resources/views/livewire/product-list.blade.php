<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click="addPro()">
        Tambah Barang
    </button>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="cancelPro()"></button>
                </div>
                <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="name">
                        <div id="emailHelp" class="form-text">Contoh : Anggur</div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" wire:model="price">
                      </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" wire:click.prevent="cancelPro()">Close</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="storePro()"  data-bs-dismiss="modal">Simpan</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!--Update Modal -->
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="cancelPro()"></button>
                </div>
                <form>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="name">
                        <div id="emailHelp" class="form-text">Contoh : Anggur</div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" wire:model="price">
                      </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" wire:click.prevent="cancelPro()">Close</button>
                    <button type="button" class="btn btn-success" wire:click.prevent="updatePro()"  data-bs-dismiss="modal">Update</button>
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
                <th>Nama</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $key = 1
            @endphp
            @if (count($products)>0)
            @foreach ($products as $product)
            <tr>
                <td>{{$key++}}</td>
                <td>{{$product->name}}</td>
                <td>{{"Rp. ".number_format($product->price,0,",",".")}}</td>
                @if ($product->qty == NUll)
                <td>0</td>
                @else
                <td>{{$product->qty}}</td>
                @endif
                <td><button class="btn btn-success" wire:click="editPro({{$product->id}})" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="bi bi-pencil"></i></button> <button class="btn btn-danger" wire:click="deletePro({{$product->id}})"><i class="bi bi-trash"></i></button></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" align="center">No Products Found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

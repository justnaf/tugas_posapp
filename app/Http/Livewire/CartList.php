<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Products;
use App\Models\OrderHead;
use App\Models\OrderDetail;

class CartList extends Component
{
    public $carts, $products_id, $qty, $cartId,$buyer,$seller, $updateCart = false, $addCart = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deleteCartListner'=>'deleteCart'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'products_id' => 'required',
        'qty' => 'required'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->qty = '';
    }

    public function render()
    {
        $this->carts = Cart::with('products')->get();
        $this->products = Products::get();

        return view('livewire.cart-list');
    }

    public function addCart()
    {
        $this->resetFields();
        $this->addCart = true;
        $this->updateCart = false;
    }

    public function cancelBuy()
    {
        $this->addCart = false;
        $this->updateCart = false;
        $this->resetFields();
    }

    public function upQty($id)
    {
        $pro = Cart::findOrFail($id);
        Cart::whereId($id)->increment('qty',1);
        Products::whereId($pro->products_id)->decrement('qty',1);
    }

    public function downQty($id)
    {
        $pro = Cart::findOrFail($id);
        Cart::whereId($id)->decrement('qty',1);
        Products::whereId($pro->products_id)->increment('qty',1);
    }


    public function storeCart()
    {
        $this->validate();
        $price = Products::whereId($this->products_id)->get('price');

        try {
            Cart::create([
                'products_id' => $this->products_id,
                'qty' => $this->qty,
            ])->first();
            Products::whereId($this->products_id)->decrement(
                'qty', $this->qty
            );
            session()->flash('success','Cart Created Successfully!!');
            $this->resetFields();
            $this->addBuy = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function deleteCart($id)
    {
        try{
            $pro = Cart::findOrFail($id);
            Products::whereId($pro->products_id)->increment('qty',$pro->qty);
            Cart::find($id)->delete();

            session()->flash('success',"Pembelian Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }

    public function checkout()
    {
        $seller = auth()->user()->name;
        $oderheadId = OrderHead::addOrderHead($this->buyer,$seller);
        try {
            $carts = Cart::with('products')->get();
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'orderhead_id' => $oderheadId,
                    'products_id' => $cart->products_id ,
                    'qty' => $cart->qty,
                    'subtotal' => $cart->qty * $cart->products->price,
                ]);
                Cart::find($cart->id)->delete();
            }
            session()->flash('success',"Order Created Successfully!!");
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function deleteAllCart()
    {
        Cart::truncate();
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Buy as Buys;
use App\Models\Products;

class PembelianList extends Component
{
    public $buys, $products_id, $price, $qty, $buyId, $updateBuy = false, $addBuy = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deleteBuyListner'=>'deleteBuy'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'products_id' => 'required',
        'price' => 'required',
        'qty' => 'required'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->price = '';
        $this->qty = '';
    }

    public function render()
    {
        $this->buys = Buys::with('products')->get();
        $this->products = Products::get();

        //dd($this->buys);
        return view('livewire.pembelian-list');
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function addBuy()
    {
        $this->resetFields();
        $this->addBuy = true;
        $this->updateBuy = false;
    }
     /**
      * store the user inputted post data in the posts table
      * @return void
      */
    public function storeBuy()
    {
        $this->validate();
        try {
            Buys::create([
                'products_id' => $this->products_id,
                'price' => $this->price,
                'qty' => $this->qty,
            ])->first();
            Products::whereId($this->products_id)->increment(
                'qty', $this->qty
            );
            session()->flash('success','Pembelian Created Successfully!!');
            $this->resetFields();
            $this->addBuy = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    public function cancelBuy()
    {
        $this->addBuy = false;
        $this->updateBuy = false;
        $this->resetFields();
    }

    public function deleteBuy($id)
    {
        try{
            $pro = Buys::findOrFail($id);
            Products::whereId($pro->products_id)->decrement('qty',$pro->qty);
            Buys::find($id)->delete();

            session()->flash('success',"Pembelian Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}

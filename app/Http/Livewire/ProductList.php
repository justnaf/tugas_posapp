<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products as Products;


class ProductList extends Component
{

    public $products,$name, $price, $proId, $updatePro = false, $addPro = false;

    /**
     * delete action listener
     */
    protected $listeners = [
        'deleteProListner'=>'deletePro'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required',
        'price' => 'required'
    ];

    /**
     * Reseting all inputted fields
     * @return void
     */
    public function resetFields(){
        $this->name = '';
        $this->price = '';
    }

    /**
     * render the post data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->products = Products::get();
        return view('livewire.product-list');
    }

    /**
     * Open Add Post form
     * @return void
     */
    public function addPro()
    {
        $this->resetFields();
        $this->addPro = true;
        $this->updatePro = false;
    }
     /**
      * store the user inputted post data in the posts table
      * @return void
      */
    public function storePro()
    {
        $this->validate();
        try {
            Products::create([
                'name' => $this->name,
                'price' => $this->price
            ]);
            session()->flash('success','Product Created Successfully!!');
            $this->resetFields();
            $this->addPro = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }

    /**
     * show existing post data in edit post form
     * @param mixed $id
     * @return void
     */
    public function editPro($id){
        try {
            $pro = Products::findOrFail($id);
            if( !$pro) {
                session()->flash('error','Pro not found');
            } else {
                $this->name = $pro->name;
                $this->price = $pro->price;
                $this->proId = $pro->id;
                $this->updatePro = true;
                $this->addPro = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }

    }

    /**
     * update the post data
     * @return void
     */
    public function updatePro()
    {
        $this->validate();
        try {
            Products::whereId($this->proId)->update([
                'name' => $this->name,
                'price' => $this->price
            ]);
            session()->flash('success','Product Updated Successfully!!');
            $this->resetFields();
            $this->updatePro = false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }

    /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelPro()
    {
        $this->addPro = false;
        $this->updatePro = false;
        $this->resetFields();
    }

    /**
     * delete specific post data from the posts table
     * @param mixed $id
     * @return void
     */
    public function deletePro($id)
    {
        try{
            Products::find($id)->delete();
            session()->flash('success',"Product Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}

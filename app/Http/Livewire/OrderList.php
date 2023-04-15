<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\OrderHead;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderList extends Component
{


    //$pdf = Pdf::loadView('pdf.invoice', $data);
    //return $pdf->download('invoice.pdf');

    public function render()
    {
        $this->orders = OrderHead::get();
        return view('livewire.order-list');
    }

    public function receiptPDF($id)
    {
        $data = OrderDetail::where('orderhead_id',$id)->with('products','orderhead')->get();
        $pdf = Pdf::loadView('receipt', $data);
        return $pdf->download('invoice.pdf');
    }
}

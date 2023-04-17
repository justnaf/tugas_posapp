<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDetail;
use App;
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
        $order = OrderDetail::where('orderhead_id',$id)->with('products','orderhead')->get();
        $sum = OrderDetail::where('orderhead_id',$id)->sum('subtotal');

        foreach ($order as $ord) {
            $detail[] = [
                'name' => $ord->products->name,
                'qty' => $ord->qty,
                'subtotal' => $ord->subtotal,
            ];
        }

        $data = [
            'orderhead_stamp' => $ord->orderhead->created_at,
            'detail' => $detail,
            'seller' => $ord->orderhead->seller,
            'buyer' => $ord->orderhead->buyer,
            'total' => $sum
        ];
        $pdf = Pdf::loadView('receipt', $data)->output();
        // dd($pdf->stream());
        return response()->streamDownload(
            fn() => print($pdf),'receipt.pdf'
        );
        // return $pdf->download('receipt.pdf');
        // return $pdf->download('invoice.pdf');
    }
}

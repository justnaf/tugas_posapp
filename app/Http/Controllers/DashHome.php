<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Buy;
use App\Models\OrderHead;
use App\Models\OrderDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class DashHome extends Controller
{
    public function dashboard()
    {
        $sedia = Products::get();
        $buys = Buy::get();
        $sells = OrderHead::get();

        $lastbuy = Buy::get('created_at')->last();

        $this->data['sedia'] = $sedia;
        $this->data['buys'] = $buys;
        $this->data['sells'] = $sells;

        return view('dashboard', $this->data);
    }


    public function receipt($id)
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
            'buyer' => $ord->orderhead->buyer,
            'seller' => $ord->orderhead->seller,
            'detail' => $detail,
            'total' => $sum
        ];

        // $pdf = Pdf::loadView('receipt', $data)->output();
        // dd($pdf->stream());
        return view('receipt')->with($data);
        // return $pdf->download('receipt.pdf');
        // return $pdf->download('invoice.pdf');
    }

    public function welcome()
    {
        # code...
    }
}

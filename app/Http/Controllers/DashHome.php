<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Buy;
use App\Models\OrderHead;

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

    public function welcome()
    {
        # code...
    }
}

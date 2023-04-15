<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $fillable = [ 'name','price','qty'];

    public function buy()
    {
        return $this->hasMany(Buy::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
    public function order()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

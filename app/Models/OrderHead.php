<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHead extends Model
{
    use HasFactory;
    protected $table = 'orderhead';
    protected $primarykey = 'id';
    protected $fillable = [ 'buyer','seller'];

    static function addOrderHead($buyer,$seller){
        $data = OrderHead::create([
            "buyer" => $buyer,
            "seller" => $seller,
        ]);

        return $data->id;
    }

    /**
     * Get all of the orderdetail for the OrderHead
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

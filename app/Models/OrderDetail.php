<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $primarykey = 'id';
    protected $fillable = [ 'orderhead_id','products_id','qty','subtotal'];

    /**
     * Get the products that owns the OrderDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    /**
     * Get the orderhead that owns the OrderDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderhead()
    {
        return $this->belongsTo(OrderHead::class);
    }

}

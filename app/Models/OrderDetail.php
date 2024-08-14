<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    public $timestamps = false;

    protected $fillable = [
        'orderid',
        'ins_no',
        'quantity',
        'price',
        'totalamount',
    ];

    /**
     * Get the item associated with the order detail.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'ins_no', 'ins_idno');
    }

    /**
     * Get the order associated with the order detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderid', 'orderid');
    }
}

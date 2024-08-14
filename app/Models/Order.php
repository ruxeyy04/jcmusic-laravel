<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'orderid';
    public $timestamps = false;

    protected $fillable = [
        'orderid',
        'date',
        'status',
        'userID',
    ];

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}

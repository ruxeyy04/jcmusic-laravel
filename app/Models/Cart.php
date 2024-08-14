<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'cartid';
    public $timestamps = true;

    protected $fillable = [
        'ins_no',
        'userID',
        'quantity',
        'dateadded',
    ];

    /**
     * Get the item associated with the cart item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'ins_no', 'ins_idno');
    }

    /**
     * Get the user associated with the cart item.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}

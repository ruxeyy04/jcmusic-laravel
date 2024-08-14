<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rents';
    protected $primaryKey = 'rentid';
    public $timestamps = true;

    protected $fillable = [
        'ins_no',
        'userID',
        'totalamountrent',
        'quantity',
        'status',
        'datetoreturn',
        'returnedDate',
    ];

    /**
     * Get the item associated with the rental.
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'ins_no', 'ins_idno');
    }

    /**
     * Get the user associated with the rental.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
}

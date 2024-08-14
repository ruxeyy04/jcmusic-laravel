<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'ins_idno';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'ins_name',
        'ins_type',
        'datereleased',
        'ins_model',
        'brand',
        'price',
        'img',
        'status',
    ];
}

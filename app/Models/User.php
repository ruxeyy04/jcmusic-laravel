<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'userID';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'firstname',
        'midname',
        'lastname',
        'address',
        'username',
        'password',
        'usertype',
    ];
}

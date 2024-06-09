<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Recordatorio extends Model
{
    use Authenticatable, Authorizable, HasFactory;


    protected $fillable = [
        'id', 'name', 'desc', 'dose', 'hour', 'date', 'user_id',
    ];

}
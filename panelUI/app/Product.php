<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Admin;

class Product extends Model
{
    protected $fillable = [
        'name'. 'admin_id', 'description', 'productImg', 'amount'
    ];
}

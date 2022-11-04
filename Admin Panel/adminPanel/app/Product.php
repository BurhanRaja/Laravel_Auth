<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'productImg', 'user_id', 'amount'
    ];

    // RelationShip
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}

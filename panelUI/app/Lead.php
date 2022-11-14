<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
<<<<<<< HEAD

    protected $fillable = ['name', 'email', 'country_code', 'mobile', 'subject', 'country', 'state', 'city'];

=======
    protected $fillable = ['name', 'email', 'country_code', 'mobile', 'subject', 'country', 'state', 'city'];

    public function scopeFilter($query, array $filters) {
        if ($filters['search'] ?? false) {
            $query->where('name' , 'like' , '%' . request('search') . '%')->orWhere('email' , 'like' , '%' . request('search') . '%')->orWhere('mobile' , 'like' , '%' . request('search') . '%')->orWhere('country' , 'like' , '%' . request('search') . '%')->orWhere('state' , 'like' , '%' . request('search') . '%')->orWhere('city' , 'like' , '%' . request('search') . '%')->orWhere('subject' , 'like' , '%' . request('search') . '%');
        }
    }
>>>>>>> 89877422d97cb20677346675c02b6fd90e6edda4
}

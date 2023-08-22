<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'first_name',
        'last_name',
        'email',
        'phone',
        'notes',
    ];


    function user()  {
        $this->belongsTo(user::class);
    }

    public function orderItems()
    {
        return $this->hasMany(orderItems::class);
    }
}
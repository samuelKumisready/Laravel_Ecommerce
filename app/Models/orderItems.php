<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'package_id',
        'name',
        'price',
        'phone',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
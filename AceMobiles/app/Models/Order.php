<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Order extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //primary key
    protected $primaryKey = 'orderID';

    //timestamps off
    public $timestamps = false;

    protected $dates = [
        'orderDate',
        'arrivalDate',
    ];


    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'userIDFK',
        'orderDate',
        'arrivalDate',
        'status',
    ];
    
     public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}

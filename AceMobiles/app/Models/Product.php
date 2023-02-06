<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    //primary key
    protected $primaryKey = 'productID';

    //timestamps off
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'productBrand',
        'productName',
        'productDescription',
        'productPrice',
        'productStock',
        'productImage',
    ];
}

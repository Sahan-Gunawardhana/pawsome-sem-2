<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'pro_name',
        'pro_price',
        'category',
        'shelf_life',
        'pro_description',
        'pro_width',
        'pro_height',
        'pro_length',
        'quantity',
        'pro_image_url'
    ];
    //declares a relation
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}

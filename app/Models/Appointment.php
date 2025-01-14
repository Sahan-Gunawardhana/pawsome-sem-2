<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory, Notifiable;

    protected  $fillable = [

        'customer_id',
        'pet_name',
        'pet_type',
        'drop_off_date',
        'pick_up_date',
        'description',
        'status'
    ];

    //declares a relation
    public function customer(){
        return $this->belongsTo(User::class, "customer_id");
    }
}

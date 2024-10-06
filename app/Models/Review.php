<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //Relación uno a muchos inversa users
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa courses
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

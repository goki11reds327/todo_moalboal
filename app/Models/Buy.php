<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredient','amount','place','item_image'
    ];
    
    // public function menu()
    // {
    //     return $this->belongsTo('App\Models\menu');
    // }
}

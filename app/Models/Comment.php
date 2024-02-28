<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

        
    protected $fillable = [
        'user_id', 'comment', 'menu_id'
    ] ;


    // use HasFactory;

    // public function menu()
    // {
    //     return $this->belongsTo('App\Models\Menu');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function buy()
    {
        return $this->hasMany('App\Models\Comments');
    }
}

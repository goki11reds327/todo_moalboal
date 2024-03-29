<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Buy extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_checked','ingredient','amount','place','item_image','who_buy','menu_id','date','user_id'
    ];
    
    public function menu()
    {
        return $this->belongsTo('App\Models\menu');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->belongsTo('App\Models\Comments');
    }

}
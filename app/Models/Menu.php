<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Card;
use App\Models\Order;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'slug',
        'price',
        'old_price',
        'category_id',
        'image',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function card(){
        return $this->hasMany(Card::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}

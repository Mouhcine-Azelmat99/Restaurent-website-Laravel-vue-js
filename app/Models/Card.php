<?php

namespace App\Models;
use App\Models\Menu;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'user_id',
        'qty'
    ];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

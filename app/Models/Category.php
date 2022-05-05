<?php

namespace App\Models;
use App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];
    public function menu(){
        return $this->hasMany(Menu::class);
    }
}

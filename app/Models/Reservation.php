<?php

namespace App\Models;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'places',
        'notes',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

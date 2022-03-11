<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'img',
        'user_id'
    ];

    //1 A MUCHOS INVERSA

    public function user(){
        return $this->belongsTo(User::class);
    }
}

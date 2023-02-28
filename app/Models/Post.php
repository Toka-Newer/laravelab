<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    // protected $table = 'post';
    protected $guarded = [];
    // public $timestamps = false;

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

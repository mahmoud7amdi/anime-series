<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'show_id',
        'user_id',
    ];

    public function shows()
    {
        return $this->belongsTo(Show::class,'show_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

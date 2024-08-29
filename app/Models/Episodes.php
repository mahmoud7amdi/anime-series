<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    use HasFactory;

    protected $fillable = [
        'episode_name',
        'video',
        'thumbnail',
        'show_id',
    ];
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}

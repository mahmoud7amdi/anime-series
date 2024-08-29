<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Show extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description',
        'type',
        'studios',
        'data_aired',
        'status',
        'category_id',
        'duration',
        'quality',
    ];

    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
    public function follows(): HasMany
    {
        return $this->hasMany(Following::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followings');
    }

    public function views(): HasMany
    {
        return $this->hasMany(Views::class);
    }

    public function uniqueViewersCount()
    {
        return $this->views()->distinct('user_id')->count('user_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episodes::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }


}

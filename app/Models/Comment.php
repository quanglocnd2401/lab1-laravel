<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'commentable_id',
        'commentable_type'
    ];

    public function commentable():MorphTo
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

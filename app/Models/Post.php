<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hashTags()
    {
        return $this->belongsToMany(HashTag::class, 'post_hash_tag');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function creator()
    {
        return $this->belongsTo(Member::class, 'creator_id');
    }
}

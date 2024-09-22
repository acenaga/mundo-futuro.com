<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasTags;
    use Sluggable;

    protected $fillable = [
        'title',
        'content',
        'featured_image',
        'excerpt',
        'published',
        'user_id',
        'category_id',
        'published'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

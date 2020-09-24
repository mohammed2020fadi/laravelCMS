<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = [
      'published_at'
    ];

    protected $fillable = [
        'title', 'description', 'content', 'published_at', 'image', 'category_id'
    ];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', now());
    }
}

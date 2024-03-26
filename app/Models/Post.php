<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Http\UploadedFile;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Searchable;
    use HasFactory;

    // Include 'image' and 'topic' in the $fillable property
    protected $fillable = ['title', 'body', 'user_id', 'image', 'topic'];

    public function toSearchableArray()
    {

        return [
            'title' => $this->title,
            'body' => $this->body,
            'topic' => $this->topic,
        ];
    }

    // Example mutator inside your Post model
    public function setImageAttribute($value)
    {
        if ($value instanceof UploadedFile) {
            $cloudinaryUpload = (new UploadApi())->upload($value->getRealPath(), [
                'folder' => 'blog_posts'
            ]);
            $this->attributes['image'] = $cloudinaryUpload['secure_url'];
        } else {
            // Set a default fallback URL if no image is provided
            $fallbackImageUrl = "https://res.cloudinary.com/drbz4rq7y/image/upload/v1711159169/64973_kqkkxt.jpg"; 
            $this->attributes['image'] = $fallbackImageUrl;
        }
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

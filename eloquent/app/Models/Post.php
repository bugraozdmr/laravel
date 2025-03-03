<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // laravel otomatik user_id olarak isimlendirdiğin için algılar migration'da
    protected $fillable = ['user_id','name'];

    function user() {
        return $this->belongsTo(User::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class, 'post_tag');
        // eğer isimlendirmeyi uygulamazsan manuel
        // return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}

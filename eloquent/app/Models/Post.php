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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // user diye sesleninc bunu algılasın one to one'a göre çeksin demek
    // user_id belongsto user => bu mantık
    function user() {
        return $this->belongsTo(User::class);
    }
}

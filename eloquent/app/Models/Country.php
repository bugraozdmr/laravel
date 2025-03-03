<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    function states() {
        return $this->hasMany(State::class);
    }

    function cities() {
        // city üzerinden city çekmek oto tanımlandı
        return $this->hasManyThrough(City::class, State::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'customers';

    protected $primaryKey = 'id';

    // Disable auto-incrementing since we will be using UUID
    public $incrementing = false;

    // Set the type of the primary key to UUID
    protected $keyType = 'string';

    // referans olmasada burda bunlar olmasa null olarak gider !
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'bank_acc_number',
        'about',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            if (empty($customer->id)) {
                $customer->id = Str::uuid();
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;

    protected $table = 'phone_book';
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}

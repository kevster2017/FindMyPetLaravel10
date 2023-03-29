<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'userName',
        'email',
        'telNum',
        'message',

    ];

    // ContactUs belongs to a user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

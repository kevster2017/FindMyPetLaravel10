<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'user_id',
        'ToUser_id',
        'ToUser_firstName',
        'firstName',
        'message',

    ];

    // Messages belongs to a user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function msgreply()
    {
        return $this->hasMany(MsgReply::class);
    }
}

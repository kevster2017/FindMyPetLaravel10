<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsgReply extends Model
{
    use HasFactory;

    public $table = 'msgreplys';

    protected $fillable = [
        'message_id',
        'FromUser_id',
        'ToUser_id', 
        'report_id',       
        'firstName',
        'ToUser_firstName',
        'message',

    ];

    // Messages belongs to a user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}

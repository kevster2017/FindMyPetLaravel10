<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMReply extends Model
{
    use HasFactory;

    public $table = 'pmreplys';

    protected $fillable = [

        'private_message_id',
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
}

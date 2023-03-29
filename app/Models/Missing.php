<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Missing extends Model
{
    use HasFactory;

    protected $table = 'missings';
    protected $primaryKey = 'id';
    // Fillable fields
    protected $fillable = [
        'user_id',
        'firstName',
        'surname',
        'petName',
        'petType',
        'petAge',
        'chipNum',
        'town',
        'postCode',
        'description',
        'img1',
        'img2',
        'img3',
        'reunited'
    ];

    // Missing belongs to a user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

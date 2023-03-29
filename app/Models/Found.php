<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Found extends Model
{
    use HasFactory;

    protected $table = 'founds';
    protected $primaryKey = 'id';
    // Fillable fields
    protected $fillable = [
        'user_id',         
        'petType',
        'town',
        'postCode',
        'description',
        'chipNum',
        'img1',
        'img2',
        'img3',
        'reunited'
    ];


    // Found belongs to a user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

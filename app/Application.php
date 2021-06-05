<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // use HasFactory;

    protected $table = 'applications';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'full_name',
        'email_id',
        'phone',
        'dob',
        'resume'
    ];
}

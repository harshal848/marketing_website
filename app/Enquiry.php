<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    // use HasFactory;

    protected $table = 'enquiry_form';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'full_name',
        'email_id',
        'phone'
    ];
}

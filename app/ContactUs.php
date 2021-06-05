<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    // use HasFactory;

    protected $table = 'contact_us';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'first_name',
        'mobile_no',
        'email'
    ];
}

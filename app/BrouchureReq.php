<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrouchureReq extends Model
{
    // use HasFactory;

    protected $table = 'brouchure_requests';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'full_name',
        'email_id',
        'contact_no'
    ];
}

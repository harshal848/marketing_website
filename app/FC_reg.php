<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FC_reg extends Model
{
    // use HasFactory;

    protected $table = 'fc_reg';

    // protected $casts = [
    //     'id' => 'integer',
    // ];

    protected $fillable = [
        'full_name',
        'contact_no',
        'pincode'
    ];
}

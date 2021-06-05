<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // use HasFactory;

    protected $table = 'client';

    protected $guarded = []; // change this to selected fillable or remove this
                            // if we want to insert values one by one
}

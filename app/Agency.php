<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    // use HasFactory;

    protected $table = 'agency';

    protected $guarded = [];    // change this to selected fillable or remove this
                                // if we want to insert values one by one
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    //protected $guarded = [''];

     protected $fillable = [
        'title', 'body'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bando extends Model
{
    protected $table = 'bandi';
        protected $fillable = [
        'titolo',
        'link',
        'ente',
        'data_pubblicazione',
        'area',
        'hash',
        'is_new'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country_lang';

    protected $fillable = [
        'id',
        'alias',
        'name',
        'name_en'
    ];
}
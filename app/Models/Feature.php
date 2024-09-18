<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function types()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_type');
    }

    public function weaknesses()
    {
        return $this->belongsToMany(Pokemon::class, 'pokemon_weakness');
    }
}

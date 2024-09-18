<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class, 'pokemon_abilities');
    }

    public function types()
    {
        return $this->belongsToMany(Feature::class, 'pokemon_type');
    }

    public function weaknesses()
    {
        return $this->belongsToMany(Feature::class, 'pokemon_weakness');
    }
}

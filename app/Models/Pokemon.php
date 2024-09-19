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
        return $this->belongsToMany(Ability::class, 'pokemon_ability', 'pokemon_id', 'ability_id');
    }

    public function types()
    {
        return $this->belongsToMany(Feature::class, 'pokemon_type', 'pokemon_id', 'feature_id');
    }

    public function weaknesses()
    {
        return $this->belongsToMany(Feature::class, 'pokemon_weakness', 'pokemon_id', 'feature_id');
    }
}

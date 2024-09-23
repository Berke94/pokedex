<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';
    protected $fillable = [
        'number',
        'name',
        'height',
        'weight',
        'thumbnail_alt_text',
        'thumbnail_image',
    ];

    public function abilities()
    {
        return $this->belongsToMany(Ability::class, 'ability_pokemon');
    }

    public function types()
    {
        return $this->belongsToMany(Feature::class, 'type_pokemon');
    }

    public function weaknesses()
    {
        return $this->belongsToMany(Feature::class, 'weakness_pokemon');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function pokemonsAsType()
    {
        return $this->belongsToMany(Pokemon::class, 'type_pokemon');
    }

    public function pokemonsAsWeakness()
    {
        return $this->belongsToMany(Pokemon::class, 'weakness_pokemon');
    }

}

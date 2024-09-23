<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;
use App\Models\Ability;
use App\Models\Feature;

class FetchPokemonData extends Command
{

    protected $signature = 'pokemon:fetch';


    protected $description = 'Pokemon verileri API den çekiliyor ve kaydediliyor';


    public function handle()
    {
        $response = Http::get('https://www.pokemon.com/us/api/pokedex/kalos');

        if ($response->successful()) {
            $pokemons = $response->json();

            $totalPokemons = count($pokemons);

            $this->output->progressStart($totalPokemons);

            foreach ($pokemons as $pokemonData) {
                $pokemon = Pokemon::create([
                    'number' => $pokemonData['number'],
                    'name' => $pokemonData['name'],
                    'height' => $pokemonData['height'],
                    'weight' => $pokemonData['weight'],
                    'thumbnail_alt_text' => $pokemonData['ThumbnailAltText'],
                    'thumbnail_image' => $pokemonData['ThumbnailImage'],
                ]);

                foreach ($pokemonData['abilities'] as $abilityName) {
                    $ability = Ability::firstOrCreate(['name' => $abilityName]);
                    $pokemon->abilities()->attach($ability);
                }

                foreach ($pokemonData['type'] as $typeName) {
                    $feature = Feature::firstOrCreate(['name' => $typeName]);
                    $pokemon->types()->attach($feature);
                }

                foreach ($pokemonData['weakness'] as $weaknessName) {
                    $feature = Feature::firstOrCreate(['name' => $weaknessName]);
                    $pokemon->weaknesses()->attach($feature);
                }

                $this->output->progressAdvance();

                $this->info("{$pokemonData['name']} isimli pokemon sisteme eklendi.");

            }
            $this->output->progressFinish();
            $this->info('Pokemonlar kaydedildi');
        }
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\League;

class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(!League::exists()) {
            League::factory(1)->create();
        }
        
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'league_id' => League::all()->random()->id
        ];
    }
}

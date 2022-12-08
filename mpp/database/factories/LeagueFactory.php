<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class LeagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(!User::exists()) {
            User::factory(1)->create();
        }
        $maxPlayers = [2, 4, 6, 8];
        return [
            'name' => fake()->city(),
            'code' => Str::random(8),
            'max_players' => $maxPlayers[array_rand($maxPlayers)],
            'admin_id' => User::all()->random()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\League;
use Illuminate\Support\Facades\DB;

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

        $userId = \App\Models\User::all()->random()->id;
        $randomLeague = League::whereNotIn(
            'id', DB::table('players')->select('league_id')->where('user_id', $userId)
        )->inRandomOrder()->whereRaw('leagues.current_players < leagues.max_players')->first();

        if (!$randomLeague) {
            dd('cet utilisateur est présent dans toutes les ligues');
        }

        $randomLeague->current_players = $randomLeague->current_players + 1;
        $randomLeague->save();

        return [
            'user_id' => $userId,
            'league_id' => $randomLeague->id
        ];
    }
}

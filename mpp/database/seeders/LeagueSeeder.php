<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\League;
use App\Models\Player;

class LeagueSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $league = League::factory(1)->create()->first();
        $check = Player::create([
            'user_id' => $league->admin_id,
            'league_id' => $league->id
        ]);
    }
}

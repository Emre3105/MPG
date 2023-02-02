<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\LineUp;

class PlayerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $player = Player::factory(1)->create()->first();
        TransferMarket::create([
            'player_id' => $player->id
        ]);
        LineUp::create([
            'player_id' => $player->id
        ]);
    }
}

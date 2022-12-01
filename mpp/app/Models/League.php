<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Player;

class League extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}

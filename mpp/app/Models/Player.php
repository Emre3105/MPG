<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\League;

class Player extends Model
{
    public function league()
    {
        return $this->belongsTo(League::class);
    }
}

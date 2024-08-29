<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'points_required'];

    public function claimedRewards()
{
    return $this->hasMany(ClaimedReward::class);
}

}

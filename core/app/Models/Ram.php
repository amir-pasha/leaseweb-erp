<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ram extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function servers() {
        return $this->belongsToMany(
            Server::class,
            ServerRam::class,
            'ram_id'
        );
    }
}

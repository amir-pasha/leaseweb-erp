<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'price' => 'float'
    ];

    protected $fillable = [
        'asset_id',
        'name',
        'price',
        'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function ramModules()
    {
        return $this->belongsToMany(
            Ram::class,
            ServerRam::class,
            'server_id',
        );
    }
}

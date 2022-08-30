<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerRam extends Model
{
    use HasFactory;

    protected $table = 'server_ram';

    protected $fillable = [
        'server_id',
        'ram_id',
        'type',
        'amount'
    ];

    public const DDR3_TYPE = 'DDR3';
    public const DDR4_TYPE = 'DDR4';
    public const RAM_TYPES = [
        self::DDR3_TYPE,
        self::DDR4_TYPE
    ];
}

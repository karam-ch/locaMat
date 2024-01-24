<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    public $table = 'device';

    public function borrows() {
        return $this->hasMany(Borrow::class, 'device_id');
    }

    protected static function booted () {
        static::deleting(function(Device $device) {
            $device->borrows()->delete();
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public $table = 'borrow';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function device() {
        return $this->belongsTo(Device::class);
    }

    public function isReturned() {
        return $this->end_date < now();
    }
}

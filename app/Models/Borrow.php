<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = ['userId', 'deviceId', 'start_date', 'end_date'];

    /**
     * The user who borrowed the device.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * The device that was borrowed.
     */
    public function device()
    {
        return $this->belongsTo(Device::class, 'deviceId');
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['type', 'name', 'ref', 'version', 'image', 'tel'];

    // Define the 'type' as an ENUM
    protected $casts = [
        'type' => 'enum:TEL,PC,TAB',
    ];
}

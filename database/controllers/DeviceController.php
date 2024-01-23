<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Get all devices.
     */
    public function getAllDevices()
    {
        $devices = Device::all();
        return response()->json($devices);
    }

    /**
     * Add a new device.
     */
    public function createDevice(Request $request)
    {
        $device = new Device();
        $device->type = $request->type;
        $device->name = $request->name;
        $device->ref = $request->ref;
        $device->version = $request->version;

        $device->tel = $request->tel;
        $device->save();

        return response()->json($device, 201);
    }
}
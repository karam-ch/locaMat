<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function list() {
        return view('device.list');
    }

    public function addG() {
        return view('device.add');
    }

    public function addP(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:30',
            'type' => 'required|in:TEL,TAB,PC',
            'reference' => 'required|in:AN,AP,XX',
            'version' => 'required|max:15',
            'tel' => 'nullable|digits:10',
        ]);

        $device = new Device;
        $device->name = $request->input('name');
        $device->type = $request->input('type');
        $device->ref = $request->input('reference');
        $device->version = $request->input('version');
        if ($request->has('tel')) {
            $device->tel = $request->input('tel');
        }
        if ($request->has('image')) {
            $image = $request->file('image');
            $content = file_get_contents($image->getRealPath());
            $device->image = $content;
        }
        $device->save();

        return redirect()->to('/home');
    }

    public function show(string $id) {
        $device = Device::findOrFail($id);
        return view('device.show', ['device' => $device]);
    }

    public function editG(string $id) {
        $device = Device::findOrFail($id);
        return view('device.edit', ['device' => $device]);
    }

    public function editP(Request $request, string $id) {
        $device = Device::findOrFail($id);
        $validate = $request->validate([
            'name' => 'max:30',
            'type' => 'in:TEL,TAB,PC',
            'reference' => 'in:AN,AP,XX',
            'version' => 'max:15',
            'tel' => 'nullable|digits:10',
        ]);

        if ($request->has('name'))
            $device->name = $request->input('name');
        if ($request->has('type'))
            $device->type = $request->input('type');
        if ($request->has('reference'))
            $device->ref = $request->input('reference');
        if ($request->has('version'))
            $device->version = $request->input('version');
        if ($request->has('tel'))
            $device->tel = $request->input('tel');
        if ($request->has('image')) {
            $image = $request->file('image');
            $content = file_get_contents($image->getRealPath());
            $device->image = $content;
        }
        $device->save();

        return redirect()->to('/device/' . $device->id);
    }

    public function delete(string $id) {
        $device = Device::findOrFail($id);
        $device->delete();
        return redirect()->to('/device/list');
    }
}

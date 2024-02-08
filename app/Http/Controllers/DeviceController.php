<?php

namespace App\Http\Controllers;

use App\Mail\ReturnAlert;
use App\Models\Borrow;
use App\Models\Device;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            'image' => 'mimes:png'
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
            'image' => 'mimes:png'
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

    public function borrow(Request $request, string $id) {
        $device = Device::findOrFail($id);
        $validate = $request->validate([
            'date' => 'required|date_format:Y-m-d|after:today|before:+1 month',
        ]);
        if ($device->currentBorrow())
            return redirect()->back()->withErrors(['msg' => 'This device is not available.'])->withInput();

        $borrow = new Borrow;
        $borrow->user_id = Auth::user()->id;
        $borrow->device_id = $device->id;
        $borrow->start_date = now();
        $borrow->end_date = $request->input('date');
        $borrow->save();

        return redirect()->to('/device/' . $device->id);
    }

    public function returnP(Request $request, string $id) {
        $device = Device::findOrFail($id);
        if ($device->currentBorrow()->user_id != Auth::user()->id and !Auth::user()->administrator)
            return redirect()->back()->withErrors('You are not the current borrower of this device.');
        $borrow = $device->currentBorrow();
        $borrow->end_date = now();
        $borrow->save();
        Mail::to('malo.jouan@etu.univ-tours.fr')->send(new ReturnAlert($borrow));
        return redirect()->back()->with('success', 'The material was returned correctly.');
    }
}

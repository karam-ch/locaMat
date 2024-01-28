<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Device;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function me() {
        return view('user.me');
    }

    public function list() {
        $users = User::all();
        return response()->json($users);
    }

    public function addG() {
        return view('user.add');
    }

    public function addP(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|max:30|email',
            'role' => 'required|in:borrower,administrator',
        ]);

        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make('password');
        $user->administrator = $request->input('role') == 'administrator';
        $user->new = true;
        $user->save();

        return redirect()->back()->with('success', 'The account has been successfully created.');
    }

    public function show(string $id) {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    public function editG(string $id) {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function editP(Request $request, string $id) {
        $user = User::findOrFail($id);
        $validate = $request->validate([
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|max:30|email',
            'password' => 'max:30|confirmed'
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        if ($request->has('password'))
            $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back()->with('success', 'The user has been successfully modified.');
    }

    public function delete(string $id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->to('/user/list');
    }
}

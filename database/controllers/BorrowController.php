<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     *  Get all borrows
     */
    public function getAllBorrows()
    {
        $borrows = Borrow::all();
        return response()->json($borrows);
    }

    /**
     * Add a new borrow
     */
    public function createBorrow(Request $request)
    {
        $borrow = new Borrow();
        $borrow->name = $request->name;
        $borrow->email = $request->email;
        $borrow->password = bcrypt($request->password);
        $borrow->save();

        return response()->json($borrow, 201);
    }

}
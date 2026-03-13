<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndexSingleAction extends Controller
{
    /**
     * Handle the incoming request.
     */

// single action controller

    public function __invoke(Request $request)
    {
        $users = User::paginate(10);
        return view('index', ['users' => $users]);
    }
}

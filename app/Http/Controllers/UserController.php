<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function createform()
    {
        return view('create');
    }

    // public function store(Request $request)
    // {
    //     // validations
    //     $request->validate([
    //         'form_name' => 'required|string|max:50',
    //         'form_email' => 'required|email|unique:users,email',
    //         'form_phone' => 'nullable|string|max:20|unique:users,db_phone',
    //     ], [
    //         'form_name.required' => 'Please provide a full name.',
    //         'form_name.min' => 'Name field must be at least 5 characters.',
    //         'form_name.max' => 'Name field must not exceed 50 characters.',
    //         'form_email.required' => 'Please provide an email address.',
    //         'form_email.unique' => 'This email address is already registered to another user.',
    //         'form_phone.required' => 'Please provide a phone number.',
    //         'form_phone.unique' => 'This phone number is already registered to another user.',
    //         'form_phone.min' => 'Phone number must be at least 10 digits.',
    //         'form_phone.max' => 'Phone number must not exceed 13 digits.',
    //     ]);

    //     $users = new User();
    //     $users->name = $request->form_name;
    //     $users->email = $request->form_email;
    //     $users->db_phone = $request->form_phone;
    //     // set dummy password for basic user creation outside of auth
    //     // this is required now that the users table expects a password
    //     $users->password = bcrypt('password123'); 
    //     $users->save();

    //     // passing data to view in Key Value Pair
    //     return redirect('/')->with('message', 'User created successfully');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'form_name' => 'required|string|max:50',
            'form_email' => 'required|email|unique:users,email',
            'form_phone' => 'nullable|string|max:20|unique:users,db_phone',
        ]);
        dd($validated);

        $user = User::create($validated);

        return redirect('/')->with('message', 'User created successfully');
    }

    // public function index()
    // {
    //     $users = User::all();
    //     return view('index', ['users' => $users]);
    // }

    public function view($id=1)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/');
        }
        // passing data to view in Key Value Pair
        return view('view', ['user' => $user]);
    }

    // public function edit($id)
    // {
    //     // $user = User::find($id);
    //     return view('edit', ['user' => $user]);
    // }

    public function edit(User $user)
    {
        // $user = User::find($id);
        return view('edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $id = $request->edit_id;

        $request->validate([
            'edit_form_name' => 'required|string|max:50',
            'edit_form_email' => 'required|email|unique:users,email,' . $id,
            'edit_form_phone' => 'nullable|string|max:20|unique:users,db_phone,' . $id,
        ], [
            'edit_form_name.required' => 'Please provide a full name.',
            'edit_form_email.required' => 'Please provide an email address.',
            'edit_form_email.unique' => 'This email address is already in use by another account.',
            'edit_form_phone.required' => 'Please provide a phone number.',
            'edit_form_phone.unique' => 'This phone number is already in use by another account.',
        ]);

        $user = User::find($id);
        $user->name = $request->edit_form_name;
        $user->email = $request->edit_form_email;
        $user->db_phone = $request->edit_form_phone;
        $user->save();

        return redirect('/')->with('message', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            return "User not found";
        }

        $user->delete();

        // passing data to view in compact() method
        $message = 'User deleted successfully';
        return redirect('/')->with(compact('message'));
    }

}

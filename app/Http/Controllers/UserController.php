<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::where('level', $request->level)->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telp' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'telp' => $request->telp,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/data/user/' . $request->level);
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     // $user_data = user::where('id_user', 'user')->first();
    //     return view('user.show', ['user' => $user]);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $request->validate([
            'name' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect('/data/user/' . $request->level);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id_user)->first();
        $user->delete();
        return redirect('/data/user/' . $request->level);
    }
}

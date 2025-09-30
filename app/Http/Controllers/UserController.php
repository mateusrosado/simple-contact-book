<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()){
            return redirect('contacts');
        }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => ['required'],
        ], [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail não é válido.',
            'email.unique' => 'O e-mail já está sendo utilizado.',
            'password.required' => 'O campo senha e obrigatório!',
        ]);

        $user = $user->fill($validated);
        $user->password = Hash::make($validated['password']);
        $user->save();
        return redirect()->intended('contacts');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateTheme()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user) {
            $theme = $user->theme === 'dark' ? 'light' : 'dark';
            $user->update([
                'theme' => $theme
            ]);
        }
        return back();
    }
}

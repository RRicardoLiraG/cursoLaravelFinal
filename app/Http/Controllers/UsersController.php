<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all(); // Puedes usar filtros si lo deseas
        return view('modules.users.users', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:1000',
            'password' => 'required|string|min:10|max:100',
            'role' => 'required',
        ]);

        $usuarios = new User();
        $usuarios->name = $datos['name'];
        $usuarios->email = $datos['email'];
        $usuarios->password = Hash::make($datos['password']);
        $usuarios->role = $datos['role'];
        $usuarios->status = "1";
        $usuarios->photo = "";
        $usuarios->id_branch = "1";
        $usuarios->last_login = "";
        $usuarios->remember_token = "";
        $usuarios->created_at = now();
        $usuarios->save();

        return redirect()->route('modules.users.users')->with('success', 'Producto creado satisfactoriamente.');
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

    public function firstUser()
    {
        User::create([
            'name' => 'Roberto Ricardo Lira González',
            'email' => 'roberto.lira@pjedomex.gob.mx',
            'password' => Hash::make('roberto.lira'),
            'role' => 'Administrador',
            'status' => 1,
            'photo' => '',
            'id_branch' => 1,
            'last_login' => '',
        ]);
        return response()->json([
            'message' => 'User created successfully',
        ]);
    }
}

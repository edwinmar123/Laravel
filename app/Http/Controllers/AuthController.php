<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Manejar el login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'password' => 'required', 
        ]);

        if (Auth::attempt(['documento' => $request->documento, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['documento' => 'Credenciales incorrectas.']);
    }

    /**
     * Mostrar el formulario de registro.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Manejar el registro.
     */
    public function register(Request $request)
    {
        $request->validate([
            'documento' => 'required|unique:usuarios,documento',
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:usuarios,correo',
            'saldo_inicial' => 'required|numeric|min:0',
            'ciudad_nacimiento' => 'required',
            'password' => 'required|min:6', // Cambiado de 'contraseña' a 'password'
        ]);

        User::create([
            'documento' => $request->documento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'saldo_inicial' => $request->saldo_inicial,
            'ciudad_nacimiento' => $request->ciudad_nacimiento,
            'password' => Hash::make($request->password), // Cambiado de 'contraseña' a 'password'
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado con éxito. Por favor, inicia sesión.');
    }

    /**
     * Mostrar el dashboard del usuario.
     */
    public function dashboard()
    {
        $usuario = Auth::user();
        return view('dashboard', compact('usuario'));
    }

    /**
     * Cerrar sesión.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
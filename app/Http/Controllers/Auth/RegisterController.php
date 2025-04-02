<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Redirigir después del registro.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Crear una nueva instancia del controlador.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validar los datos del registro.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'documento' => ['required', 'string', 'max:255', 'unique:users'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'saldo_inicial' => ['required', 'numeric', 'min:0'],
            'ciudad_nacimiento' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Confirmación de contraseña
        ]);
    }

    /**
     * Crear un nuevo usuario después del registro válido.
     */
    protected function create(array $data)
    {
        return User::create([
            'documento' => $data['documento'],
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'saldo_inicial' => $data['saldo_inicial'],
            'ciudad_nacimiento' => $data['ciudad_nacimiento'],
            'password' => Hash::make($data['password']),
            // 're
        ]);
    }
}
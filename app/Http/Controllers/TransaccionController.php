<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\User;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Realizar un retiro.
     */
    public function retirar(Request $request)
    {
        $request->validate([
            'usuario_documento' => 'required|exists:usuarios,documento', 
            'monto' => 'required|numeric|min:1',                        
        ]);

    
        $usuario = User::where('documento', $request->usuario_documento)->first();

        if ($usuario->saldo_inicial < $request->monto) {
            return response()->json(['message' => 'Saldo insuficiente'], 400);
        }

      
        Transaccion::create([
            'usuario_documento' => $usuario->documento, 
            'monto' => $request->monto,
            'tipo' => 'retiro',
        ]);

      
        $usuario->saldo_inicial -= $request->monto;
        $usuario->save();

        return response()->json([
            'message' => 'Retiro exitoso',
            'saldo_actual' => $usuario->saldo_inicial,
        ]);
    }
}
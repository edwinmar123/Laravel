<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    /**
     * 
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id', 
        'monto',     
        'tipo',       
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
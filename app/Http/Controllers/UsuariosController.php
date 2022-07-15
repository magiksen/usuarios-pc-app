<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index() {

        // Traer IP
        //$ip=\Request::ip();


        //$dbusuario = Usuario::where('ip', $ip)->get();
        

        return view('welcome');
    }

    public function guardar(Request $request) {

        $validated = $request->validate([
            'usuario' => 'unique:usuarios',
            'pcnombre' => 'unique:usuarios',
            'mac' => 'unique:usuarios',
            'ip' => 'unique:usuarios',
        ],
        [
            'usuario.unique' => 'Usuario Ya registrado',
            'pcnombre.unique' => 'Este nombe ya lo tiene otra PC',
            'mac.unique' => 'MAC ya registrada',
            'ip.unique' => 'IP ya esta registrada',
        ]);
        
        $usuario = new Usuario; 
        $usuario->usuario = $request->usuario;
        $usuario->pcnombre = $request->pcnombre;
        $usuario->departamento = $request->departamento;  
        $usuario->mac = $request->mac; 
        $usuario->ip = $request->ip;  
        $usuario->save();

        return Redirect()->back()->with('success', 'Usuario registrado correctamente');

    }

    public function listar() {
        $dbusuario = Usuario::latest()->paginate(20);
        
        return view('lista', compact('dbusuario'));
    }
}

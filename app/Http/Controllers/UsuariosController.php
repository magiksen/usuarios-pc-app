<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index() {

        // Traer IP
        //$ip=\Request::ip();

        $dbusuario = Usuario::latest()->get();

        return view('lista', compact('dbusuario'));
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

    public function eliminar($id) {
        $usuario = Usuario::find($id);

        $usuario->delete();


        return Redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }

    public function editar($id) {
        $usuario = Usuario::find($id);

        return view('editar', compact('usuario'));
    }

    public function update(Request $request, $id) {
        $usuario = Usuario::find($id);

        $usuario->usuario = $request->usuario;
        $usuario->pcnombre = $request->pcnombre;
        $usuario->departamento = $request->departamento;
        $usuario->mac = $request->mac;
        $usuario->ip = $request->ip;
        $usuario->save();

        return Redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

}

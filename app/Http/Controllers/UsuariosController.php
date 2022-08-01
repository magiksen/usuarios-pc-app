<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(Request $request) {

        // Traer IP
        //$ip=\Request::ip();

        if ($request->filled('search')) {
            $dbusuario = Usuario::search($request->search)->get(); // search by value
        } else {
            $dbusuario = Usuario::orderBy('id', 'desc')->get();
        }

        //$dbusuario = Usuario::orderBy('id', 'desc')->get();

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
        $usuario->usuario = mb_strtoupper($request->usuario, "UTF-8");
        $usuario->pcnombre = mb_strtoupper($request->pcnombre, "UTF-8");
        $usuario->departamento = mb_strtoupper($request->departamento, "UTF-8");
        $usuario->mac = mb_strtoupper($request->mac, "UTF-8");
        $usuario->ip = $request->ip;
        $usuario->save();

        return Redirect()->back()->with('success', 'Usuario registrado correctamente');

    }

    public function eliminar(Usuario $usuario) {
        $usuario->delete();

        return Redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }

    public function editar($id) {
        $usuario = Usuario::find($id);

        return view('editar', compact('usuario'));
    }

    public function update(Request $request, Usuario $usuario) {
//        $usuario = Usuario::find($id);

        $request->validate([
            'usuario' => 'unique:usuarios,usuario,' . $usuario->id,
            'pcnombre' => 'unique:usuarios,pcnombre,' . $usuario->id,
            'mac' => 'unique:usuarios,mac,' . $usuario->id,
            'ip' => 'unique:usuarios,ip,' . $usuario->id,
        ],
        [
            'usuario.unique' => 'Usuario Ya registrado',
            'pcnombre.unique' => 'Este nombe ya lo tiene otra PC',
            'mac.unique' => 'MAC ya registrada',
            'ip.unique' => 'IP ya esta registrada',
        ]);

        $usuario->usuario = mb_strtoupper($request->usuario, "UTF-8");
        $usuario->pcnombre = mb_strtoupper($request->pcnombre, "UTF-8");
        $usuario->departamento = mb_strtoupper($request->departamento, "UTF-8");
        $usuario->mac = mb_strtoupper($request->mac, "UTF-8");
        $usuario->ip = $request->ip;
        $usuario->save();

        return Redirect()->back()->with('success', 'Usuario actualizado correctamente');
    }

}

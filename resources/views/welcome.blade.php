@extends('template')

@section('content')


    <div class="container px-4 mx-auto">
        @if(session('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3 w-3/5 mt-6 mx-auto" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mt-5 mb-5 px-3 py-3 rounded bg-gray-800 text-2xl font-bold text-white w-1/2 mx-auto text-center">Registrar PC & Usuario</h1>

        <div class="w-3/5 mt-6 mx-auto bg-gray-200 px-3 py-3">
                <h5 class="mt-3 mb-3 px-2 py-2 rounded text-lg font-bold text-cyan-900 w-1/2 mx-auto text-center">Usuario y PC a registrar</h5>
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mac" class="uppercase text-gray-700 text-xs">MAC</label>
                        <input class="rounded border-gray-200 w-full mb-4" type="text" name="mac" id="mac" placeholder="Introducir MAC">
                        @error('mac')
                            <span class="text-xs text-red-600">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ip" class="uppercase text-gray-700 text-xs">IP</label>
                        <input class="rounded border-gray-200 w-full mb-4" type="text" name="ip" id="ip" placeholder="Introducir IP">
                        @error('ip')
                            <span class="text-xs text-red-600">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="usuario" class="uppercase text-gray-700 text-xs">USUARIO</label>
                        <input class="rounded border-gray-200 w-full mb-4" type="text" name="usuario" id="usuario" placeholder="Introducir Nombre y Apellido">
                        @error('usuario')
                            <span class="text-xs text-red-600">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pcnombre" class="uppercase text-gray-700 text-xs">NOMBRE PC</label>
                        <input class="rounded border-gray-200 w-full mb-4" type="text" name="pcnombre" id="pcnombre" placeholder="Introducir Nombe de la PC">
                        @error('pcnombre')
                            <span class="text-xs text-red-600">{{ $message  }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="departamento" class="uppercase text-gray-700 text-xs">UNIDAD ADMINISTRATIVA</label>
                        <input class="rounded border-gray-200 w-full mb-4" type="text" name="departamento" id="departamento" placeholder="Introducir el Departamento al cual pertenece">
                    </div>
                        <input class="bg-cyan-900 text-white rounded px-4 py-2" type="submit" value="Registrar">
                </form>
        </div>
</div>

@endsection

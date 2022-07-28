@extends('template')

@section('content')

<div class="container px-4 mx-auto">
        <h1 class="mt-5 mb-5 px-3 py-3 rounded bg-gray-800 text-2xl font-bold text-white w-1/2 mx-auto text-center">Lista de Usuarios y Computadoras</h1>

        @if(session('success'))
            <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3 w-3/5 mt-6 mx-auto" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="px-4 mx-auto flex justify-center mt-5">
                <table class="min-w-full text-center">
                    <thead class="border-b bg-gray-800">
                        <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">#</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Usuario</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Nombre PC</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Departamento</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">MAC</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">IP</th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dbusuario as $usuario)
                        <tr class="bg-gay-200 border-b">
                        <th class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $usuario->id }}</th>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $usuario->usuario }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $usuario->pcnombre }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $usuario->departamento }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $usuario->mac }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $usuario->ip }}</td>
                        <td>
                            <a href="{{ route('usuarios.editar', $usuario) }}" class="bg-amber-600 text-white rounded px-4 py-2 mr-2">Editar</a>
{{--                            <a onclick="return deleteConfirmation()" href="{{ route('usuarios.eliminar', $usuario) }}" class="bg-red-900 text-white rounded px-4 py-2">Eliminar</a>--}}
                            <form class="inline" action="{{ route('usuarios.eliminar', $usuario) }}" method="post">
                                @csrf
                                <button class="delete-confirm bg-red-900 text-white rounded px-4 py-2" >Eliminar</button>
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
{{--                {{ $dbusuario->links() }}--}}
        </div>
</div>

<script>
    // const elemento = document.getElementById('delete-confirm');
    $('.delete-confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        const { value: confirmacion } = Swal.fire({
            title: 'Ingresa "Eliminar" para continuar',
            input: 'text',
            inputLabel: 'Confirmar eliminar',
            inputValue: '',
            showCancelButton: true,
            inputValidator: (value) => {
                if (value !== "Eliminar") {
                    return 'Ingrese la palabra correcta'
                }
            }
        }).then((confirmacion)=> {
            if (confirmacion) {
                // Swal.fire(`Item eliminado correctamente`);
                form.submit();
            }
        });


    });
</script>
@endsection


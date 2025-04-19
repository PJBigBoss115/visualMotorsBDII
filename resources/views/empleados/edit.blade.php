<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Juan" value="{{ $empleado->nombre }}" />
                        </div>
                        <div>
                            <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                            <input type="text" id="apellido" name="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Torres" value="{{ $empleado->apellido }}" />
                        </div>
                        <div>
                            <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                            <select name="cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccione un cargo</option>
                                @foreach(App\Models\Empleado::cargosEmpleados() as $valor => $texto)
                                <option value="{{ $valor }}" {{ $empleado->cargo == $valor ? 'selected' : '' }}>
                                    {{ $texto }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="salario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Salario</label>
                            <input type="number" step="0.01" min="0" id="salario" name="salario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="3865.00" value="{{ $empleado->salario }}" />
                        </div>
                        <div>
                            <label for="fecha_contratacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Contratación</label>
                            <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $empleado->fecha_contratacion }}" />
                        </div>
                        <div class="mb-6">
                            <label for="id_usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignar usuario</label>
                            <select id="id_usuario" name="id_usuario"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccione un usuario</option>
                                @foreach($resp as $id => $nombre)
                                <option value="{{ $id }}" {{ $empleado->id_usuario == $id ? 'selected' : '' }}>
                                    {{ $nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Grabar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
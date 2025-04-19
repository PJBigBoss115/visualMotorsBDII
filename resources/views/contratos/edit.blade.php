<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Contrato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('contratos.update', $contrato->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                        <div>
                            <label for="id_empleado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Empleado</label>
                            <select id="id_empleado" name="id_empleado"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccione un empleado</option>
                                @foreach($resp as $id => $nombre)
                                <option value="{{ $id }}" {{ $contrato->id_empleado == $id ? 'selected' : '' }}>
                                    {{ $nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                            <select name="tipo" id="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                    dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Seleccione un tipo</option>
                                @foreach(App\Models\Contrato::tiposcontratos() as $valor => $texto)
                                <option value="{{ $valor }}" {{ $contrato->tipo == $valor ? 'selected' : '' }}>
                                    {{ $texto }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="fecha_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Inicio de Contratación</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $contrato->fecha_inicio }}" />
                        </div>
                        <div>
                            <label for="fecha_fin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Final de Contratación</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" value="{{ $contrato->fecha_fin }}" />
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-6">Grabar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

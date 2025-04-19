<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <style>
                table.dataTable td {
                    text-align: left !important;
                }

                table th {
                    text-align: left !important;
                }
            </style>

            <a href="{{ route('empleados.create') }}"
                class="inline-block bg-sky-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 mb-4">
                {{ __('Crear Nuevo') }}
            </a>

            <div class="bg-white shadow-md rounded-lg p-6">
                <table id="empleados-table" class="min-w-full border-collapse table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-600">Nombre Completo</th>
                            <th class="px-4 py-2 text-left text-gray-600">Cargo</th>
                            <th class="px-4 py-2 text-left text-gray-600">Salario</th>
                            <th class="px-4 py-2 text-left text-gray-600">Fecha de Contratación</th>
                            <th class="px-4 py-2 text-left text-gray-600">Usuario</th>
                            <th class="px-4 py-2 text-left text-gray-600"></th>
                        </tr>
                    </thead>
                </table>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    const table = $('#empleados-table').DataTable({
                        processing: true,
                        serverSide: true,
                        responsive: true,
                        ajax: '{{ route("empleados.data") }}',
                        columns: [{
                                data: 'nombre_completo',
                                name: 'nombre_completo'
                            },
                            {
                                data: 'cargo',
                                name: 'cargo'
                            },
                            {
                                data: 'salario',
                                name: 'salario'
                            },
                            {
                                data: 'fecha_contratacion',
                                name: 'fecha_contratacion'
                            },
                            {
                                data: 'usuario',
                                name: 'usuario'
                            },
                            {
                                data: 'acciones',
                                name: 'acciones',
                                searchable: false,
                                orderable: false
                            }
                        ],
                        /*language: {
                            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                        },*/
                        pagingType: 'numbers',
                        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        initComplete: function() {
                            $('.dt-search input')
                                .addClass('bg-gray-100 border border-gray-300 rounded-md p-2 w-64 text-sm text-gray-700');

                            $('.dt-search').addClass('mb-4');

                            $('.dt-length select')
                                .addClass('bg-white border border-gray-300 rounded-md p-2 text-sm text-gray-700 w-32 pr-10');

                            $('.dt-length label')
                                .addClass('text-sm text-gray-600');

                            $('.dt-info').addClass('mt-4')
                        },
                    });
                });
            </script>

        </div>
    </div>
</x-app-layout>
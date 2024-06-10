<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">
                        Nombre alumno
                    </th>
                    <th class="px-6 py-3">
                        1ºtrimestre
                    </th>
                    <th class="px-6 py-3">
                        2ºtrimestre
                    </th>
                    <th class="px-6 py-3">
                        3ºtrimestre
                    </th>
                    <th class="px-6 py-3">
                        Nota final
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $asignatura->nombres_alumnos() !!}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $asignatura->notas_primer_trimestre() !!}
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {!! $asignatura->notas_segun_trimestre() !!}
                    </td>


                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>

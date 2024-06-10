<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th  class="px-6 py-3">
                        Denominación
                    </th>

                    <th  class="px-6 py-3">
                        Numero de trimestres
                    </th>


                    <th  class="px-6 py-3">
                        Editar
                    </th>
                    <th  class="px-6 py-3">
                        Borrar
                    </th>
                </tr>
            </thead>
            <br><br><br>
            <tbody>
                @foreach ($asignaturas as $asignatura)
                    <tr class="bg-white border-b">
                        <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('asignaturas.show', ['asignatura' => $asignatura]) }}" class="text-blue-500">
                                {{ $asignatura->denominacion }}
                            </a>
                        </th>

                        <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">

                                {{ $asignatura->numero_de_trimestres }}

                        </th>

                        <td class="px-6 py-4">
                            <a href="{{ route('asignaturas.edit', ['asignatura' => $asignatura]) }}" class="font-medium text-blue-600 hover:underline">
                                <x-primary-button>
                                    Editar
                                </x-primary-button>
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('asignaturas.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo asignatura</x-primary-button>
        </form>
    </div>
</x-app-layout>

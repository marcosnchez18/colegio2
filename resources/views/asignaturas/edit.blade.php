<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST"
            action="{{ route('asignaturas.update', ['asignatura' => $asignatura]) }}">
            @csrf
            @method('PUT')

            <!-- denominacion -->
            <div>
                <x-input-label for="denominacion" :value="'denominacion del asignatura'" />
                <x-text-input id="denominacion" class="block mt-1 w-full"
                    type="text" name="denominacion" :value="old('denominacion', $asignatura->denominacion)" required
                    autofocus autocomplete="denominacion" />
                <x-input-error :messages="$errors->get('denominacion')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="numero_de_trimestres" :value="'Número de Trimestres'" />
                <select id="numero_de_trimestres"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="numero_de_trimestres">
                    <option value="2" {{ old('numero_de_trimestres', $asignatura->numero_de_trimestres) == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('numero_de_trimestres', $asignatura->numero_de_trimestres) == 3 ? 'selected' : '' }}>3</option>
                </select>
                <x-input-error :messages="$errors->get('numero_de_trimestres')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('asignaturas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Editar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

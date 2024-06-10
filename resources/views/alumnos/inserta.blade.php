<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('alumnos.inserta') }}">
            @csrf

            <div class="mt-4">
                <x-input-label for="alumno_id" :value="'Alumnos'" />
                <select id="alumno_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="alumno_id">
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}"
                            {{ old('alumno_id') == $alumno->id ? 'selected' : '' }}
                            >
                            {{ $alumno->nombre }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('alumno_id')" class="mt-2" />
            </div>




            <div class="mt-4">
                <x-input-label for="asignatura_id" :value="'asignaturas'" />
                <select id="asignatura_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="asignatura_id">
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura->id }}"
                            {{ old('asignatura_id') == $asignatura->id ? 'selected' : '' }}
                            >
                            {{ $asignatura->denominacion }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('asignatura_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="trimestre" :value="'Trimestres'" />
                <select id="trimestre"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="trimestre">
                    <option value="1" {{ (old('trimestre') == 1) ? 'selected' : '' }}>1</option>
                    <option value="2" {{ (old('trimestre') == 2) ? 'selected' : '' }}>2</option>
                    <option value="3" {{ (old('trimestre') == 3) ? 'selected' : '' }}>3</option>
                </select>
                <x-input-error :messages="$errors->get('trimestre')" class="mt-2" />
            </div>



            <div class="mt-4">
                <x-input-label for="nota" :value="'Nota'" />
                <select id="nota"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="nota">
                    @for ($i = 0; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('nota' ) == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <x-input-error :messages="$errors->get('nota')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('alumnos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>



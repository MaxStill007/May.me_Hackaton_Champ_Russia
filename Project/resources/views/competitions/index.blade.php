<x-layout>
    <div class="mt-8">
        <div class="flex h-full">
            <div class="rounded-s-lg h-full w-1/5 bg-gray-50 border-e-2 border-black/60">

                <form method="GET" action="/" class="max-w-sm mx-auto">
                    <div class="py-3 px-4 flex flex-col gap-4 justify-center items-center">
                        <x-form-select :label="'Идентификатор'" :options="$ids" name="id" key="id"></x-form-select>
                        <x-form-select :label="'Тип соревнования'" :options="$types" name="type" key="type"></x-form-select>
                        <x-form-select :label="'Место проведения'" :options="$locations" name="location" key="location"></x-form-select>
                        <span class="text-gray-900 py-2 font-bold">Дата проведения</span>
                        <x-date-range :label="'От:'" name="start_date" key="start_date"></x-date-range>
                        <x-date-range :label="'До:'" name="end_date" key="end_date"></x-date-range>
                        <x-button-main>Поиск</x-button-main>
                    </div>
                    {{-- <input type="text" name="city" list="citynames">
                    <datalist id="citynames">
                        <option value="Boston">
                        <option value="Cambridge">
                    </datalist> --}}
                </form>
            </div>
            <div class="pl-12 w-full flex flex-col gap-4">
                <div class="">
                    {{$competitions->withQueryString()->links()}}
                </div>
                @foreach ($competitions as $competition)
                    <x-competition-card-wide :competition="$competition"></x-competition-card-wide>
                @endforeach
                <div class="mt-6 mb-10">
                    {{$competitions->withQueryString()->links()}}
                </div>
            </div>

        </div>
    </div>
</x-layout>

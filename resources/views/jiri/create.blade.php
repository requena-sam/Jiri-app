<x-layouts.main>
    <h1>Créer un nouveau jiri</h1>
    <form action="/jiris" method="post">
        @csrf
        <div class="flex flex-col pb-3">
            <label for="name">Nom du jiri
                @error('name')
                <span class="block text-red-500 font-bold">{{$message}}</span>
                @enderror
            </label>
            <input
                class="bg-gray-100 p-2 rounded"
                type="text"
                name="name"
                id="name"
                autocapitalize="none"
                placeholder="Projet Web 2026"
                value="{{old('name')}}">
        </div>
        <div class="flex flex-col pb-3">
            <label for="starting_at">Date de début
                @error('starting_at')
                <span class="block text-red-500 font-bold">{{$message}}</span>
                @enderror
            </label>
            <input
                class="bg-gray-100  p-2 rounded"
                type="text"
                name="starting_at"
                id="starting_at"
                placeholder="2024-12-12 12:00"
                value="{{old('starting_at')}}">
        </div>
        <button type="submit" class="mt-3 p-3 rounded text-white rounded bg-red-500 w-full  box-border ">Créer le jiri</button>
    </form>
</x-layouts.main>

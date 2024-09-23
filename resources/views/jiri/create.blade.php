<x-layouts.main>
   <h1>Créer un nouveau jiri</h1>
    <form action="/jiris" method="post" class="max-w-80">
        @csrf
        <div class="flex flex-col pb-3">
            <label for="name">Nom du jiri</label>
            <input type="text" name="name" id="name" class="bg-gray-100 p-2 rounded">
        </div>
        <div class="flex flex-col pb-3">
            <label for="starting_at">Date de début</label>
            <input type="text" name="starting_at" id="starting_at" placeholder="2024-12-12 12:00" class="bg-gray-100  p-2 rounded">
        </div>
        <button type="submit" class="mt-3 p-3 rounded text-white rounded bg-red-500">Créer le jiri</button>
    </form>
</x-layouts.main>

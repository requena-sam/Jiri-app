<x-layouts.main>
    <h1>{{__('Create a new Jiri')}}</h1>
    <form action="/jiris" method="post">
        @csrf
        <div class="flex flex-col pb-3">
            <label for="name">{{__("Jiri's name")}}
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
            <label for="starting_at">{{__('Starting at')}}
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
        <x-button>{{__('Create a new Jiri')}}</x-button>
    </form>
</x-layouts.main>

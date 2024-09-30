<x-layouts.main>
    <h1>{{__('Create new contact')}}</h1>
    <form action="/contacts" method="post">
        @csrf
        <div class="flex flex-col pb-3">
            <label for="name">{{__('Contact name')}}
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
                placeholder="Joseph Truc"
                value="{{old('name')}}">
        </div>
        <div class="flex flex-col pb-3">
            <label for="email">Email
                @error('email')
                <span class="block text-red-500 font-bold">{{$message}}</span>
                @enderror
            </label>
            <input
                class="bg-gray-100  p-2 rounded"
                type="text"
                name="email"
                id="email"
                placeholder="josephtruc@gmail.com"
                value="{{old('email')}}">
        </div>
        <x-button>{{__('Create new contact')}}</x-button>
    </form>
</x-layouts.main>

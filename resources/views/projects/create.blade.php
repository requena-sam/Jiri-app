<x-layouts.main>
    <h1>{{__('Create new project')}}</h1>
    <form action="/projects" method="post">
        @csrf
        <div class="flex flex-col pb-3">
            <label for="name">{{__('Project name')}}
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
                    placeholder="{{__('My new project')}}"
                    value="{{old('name')}}">
        </div>
        <div class="flex flex-col pb-3">
            <label for="description">{{__('Description')}}
                @error('description')
                <span class="block text-red-500 font-bold">{{$message}}</span>
                @enderror
            </label>
            <input
                    class="bg-gray-100  p-2 rounded"
                    type="text"
                    name="description"
                    id="description"
                    placeholder="{{__('Description of my project')}}"
                    value="{{old('description')}}">
        </div>
        <div class="flex flex-col pb-3">
            <label for="description">URL
                @error('url')
                <span class="block text-red-500 font-bold">{{$message}}</span>
                @enderror
            </label>
            <input
                    class="bg-gray-100  p-2 rounded"
                    type="text"
                    name="url"
                    id="url"
                    placeholder="http://test.com/"
                    value="{{old('url')}}">
        </div>
       <x-button>{{__('Create new project')}}</x-button>
    </form>
</x-layouts.main>

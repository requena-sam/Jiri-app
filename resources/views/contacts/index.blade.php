<x-layouts.main>
    <div class="flex gap-3 items-center">
        <h1 class="font-bold text-2xl">{{__('Your Contacts')}}</h1>
        <a class="p-2 text-xs  text-white rounded bg-red-500 rounded hover:bg-red-700 " href="{{route('contact.create')}}">{{__('+')}}</a>
    </div>
    <ul class="grid grid-cols-3 gap-4 ">
        @foreach($contacts as $contact)
            <li class="p-7 bg-gray-100 rounded center text-center">
                <a href="/contacts/{{$contact->id}}">{{$contact->name}}</a>
            </li>
        @endforeach
    </ul>
</x-layouts.main>

<x-layouts.main>
    <h1 class="font-bold text-2xl">Your Contacts</h1>
    <ul class="grid grid-cols-3 gap-4 ">
        @foreach($contacts as $contact)
            <li class="p-7 bg-gray-100 rounded center text-center">
                <a href="/contacts/{{$contact->id}}">{{$contact->name}}</a>
            </li>
        @endforeach
    </ul>
</x-layouts.main>

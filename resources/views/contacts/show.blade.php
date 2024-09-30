<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$contact->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <h2 class="font-bold">{{__('Contact name')}}</h2>
            <p>{{$contact->name}}</p>
            <h2 class="font-bold">{{__('Contact email')}}</h2>
            <p>{{$contact->email}}</p>
        </div>
    </dl>
    <div class="flex gap-3">
        <x-link href="{{route('contact.edit', $contact)}}">
            {{__('Edit this contact')}}
        </x-link>
        <form action="{{route('contact.delete', $contact)}}" method="post">
            @method('DELETE')
            @csrf
            <x-button>{{__('Delete this contact')}}</x-button>
        </form>
    </div>
</x-layouts.main>

<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$contact->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <h2 class="font-bold">Contact name</h2>
            <p>{{$contact->name}}</p>
            <h2 class="font-bold">Contact email</h2>
            <p>{{$contact->email}}</p>
        </div>
    </dl>
</x-layouts.main>

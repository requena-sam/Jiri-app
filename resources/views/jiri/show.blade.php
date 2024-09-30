<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ $jiri->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{__("Jiri's name")}}</dt>
            <dd>{{$jiri->name}}</dd>
        </div>
        <div>
            <dt class="font-bold">{{__('Starting at')}}</dt>
            <dd>{{$jiri->starting_at->diffForHumans()}}.
            </dd>
            <dd>
                <time datetime="{{$jiri->starting_at}}"> on {{$jiri->starting_at->format('d/m/Y')}}
                    at {{$jiri->starting_at->format('H:i')}}</time>
            </dd>
        </div>
    </dl>
    <div class="mt-3 flex gap-3">
        <x-link href="{{route('jiri.edit', $jiri)}}">
            {{__('Edit this Jiri')}}
        </x-link>
        <form action="{{route('jiri.delete', $jiri)}}" method="post">
            @method('DELETE')
            @csrf
            <x-button>
                {{__('Delete this Jiri')}}
            </x-button>
        </form>
    </div>
</x-layouts.main>

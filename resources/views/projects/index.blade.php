<x-layouts.main>
    <div class="flex gap-3 items-center">
        <h1 class="font-bold text-2xl">{{__('Your Projects')}}</h1>
        <a class="p-2 text-xs  text-white rounded bg-red-500 rounded hover:bg-red-700 " href="{{route('project.create')}}">{{__('+')}}</a>
    </div>
    <ul class="grid-cols-3">
        @foreach($projects as $project)
            <li>
                <a href="{{route('project.show', $project)}}">{{$project->name}}</a>
            </li>

        @endforeach
    </ul>
</x-layouts.main>

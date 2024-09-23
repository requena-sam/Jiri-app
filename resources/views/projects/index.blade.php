<x-layouts.main>
    <h1 class="font-bold text-2xl">Your Projects</h1>
    <ul class="grid-cols-3">
        @foreach($projects as $project)
            <li>
                <a href="/projects/{{$project->id}}">{{$project->name}}</a>
            </li>

        @endforeach
    </ul>
</x-layouts.main>

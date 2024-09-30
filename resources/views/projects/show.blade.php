<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$project->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <h2 class="font-bold">{{__('Project Name')}}</h2>
            <p>{{$project->name}}</p>
            <h2 class="font-bold">{{__('Description')}}</h2>
            <p>{{$project->description}}</p>
            <h2 class="font-bold">{{__('Project URL')}}</h2>
            <a class="text-blue-400 hover:underline" href="{{$project->url}}">{{$project->url}}</a>
        </div>
    </dl>
    <div class="flex gap-3">
        <x-link href="{{route('project.edit', $project)}}">
            {{__('Edit this project')}}
        </x-link>
        <form action="{{route('project.delete', $project)}}" method="post">
            @method('DELETE')
            @csrf
            <x-button>{{__('Delete this project')}}</x-button>
        </form>
    </div>

</x-layouts.main>

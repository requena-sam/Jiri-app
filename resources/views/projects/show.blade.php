<x-layouts.main>
    <h1 class="font-bold text-2xl">{{$project->name}}</h1>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <h2 class="font-bold">Project Name</h2>
            <p>{{$project->name}}</p>
            <h2 class="font-bold">Description</h2>
            <p>{{$project->description}}</p>
            <h2 class="font-bold">Project URL</h2>
            <p>{{$project->url}}</p>
        </div>
    </dl>
</x-layouts.main>

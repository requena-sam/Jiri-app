<x-layouts.main>
    <h1 class="font-bold text-2xl">{{ $jiri->name }}</h1>
    <a href="/jiris" class="underline">← {{ __("Back") }}</a>
    <dl class="flex flex-col gap-4 bg-slate-50 p-4">
        <div>
            <dt class="font-bold">{{ __("Jiri name") }}</dt>
            <dd>{{ $jiri->name }}</dd>
        </div>
        <div>
            <dt class="font-bold">{{ __("Starting at") }}</dt>
            <dd>
                {{ $jiri->starting_at->diffForHumans() }}
            </dd>
            <dd>
                <time datetime="{{ $jiri->starting_at }}">
                    {{ __("The") }} {{ $jiri->starting_at->format('d M Y') }} {{ __("at") }} {{ $jiri->starting_at->format('H:i') }}
                </time>
            </dd>
        </div>
        <div class="flex gap-6">
            <article>
                <h3 class="font-bold mb-2 text-2xl">Students</h3>
                <ul>
                    @foreach($jiri->students as $student)
                        <div class="flex gap-3">
                            <li>{{ $student->full_name }}</li>
                            <form action="{{route('attendances.update', $student->pivot->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Evaluator->value}}">
                                <button type="submit" class="text-blue-400">{{ __("Change role") }}</button>
                            </form>
                        </div>
                    @endforeach
                </ul>
            </article>
            <article>
                <h3 class="font-bold mb-2 text-2xl">Evaluators</h3>
                <ul>
                    @foreach($jiri->evaluators as $evaluator)
                        <div class="flex gap-3">
                            <li>{{ $evaluator->full_name }}</li>
                            <form action="{{route('attendances.update', $evaluator->pivot->id)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="role" value="{{\App\Enums\ContactRole::Student->value}}">
                                <button type="submit" class="text-blue-400">{{ __("Change role") }}</button>
                            </form>
                        </div>
                @endforeach
            </article>
        </div>
        <article>
            <h3 class="font-bold mb-2 text-2xl">{{__('Projects for this jiri')}}</h3>
            @foreach($jiri->projects as $project)
                <article class="mt-8">
                    <div class="mb-3">
                        <h4 class="font-bold ">Nom du projet</h4>
                        <p>{{ $project->name }}</p>
                    </div>
                    <h4 class="font-bold">Description du projet</h4>
                    <p>{{$project->description}}</p>
                </article>
                <hr class="border-t-2 border-gray-300 my-4" />
            @endforeach
        </article>
    </dl>
    <div class="flex gap-2">
        @can('update', $jiri)
            <a class="bg-slate-700 font-bold text-white rounded-md py-4 px-6 self-start inline-block hover:bg-slate-900 transition"
               href="/jiris/{{ $jiri->id }}/edit">{{ __("Edit this Jiri") }}</a>
        @endcan
        @can('delete', $jiri)
            <x-form.jiri.delete :$jiri/>
        @endcan
    </div>
</x-layouts.main>

<form {{ $attributes }} method="post" class="flex flex-col gap-4 bg-slate-50 p-4">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <x-form.input
        label="Name"
        type="text"
        name="name"
        placeholder="Jon Doe"
    />
    <x-form.input
        label="Starting at"
        type="text"
        name="starting_at"
        :placeholder="now()"
    />
 <div>
    <h2 class="font-bold mb-0 pb-1">Liste des contacts</h2>
    <div class="grid grid-cols-3 gap-3">
        @foreach($contacts as $contact)
            <div class="flex gap-2 items-center">
                <select class="rounded" name="roles[]" id="{{ $contact->id }}">
                    <option value="" selected>Role</option>
                    <option value="{{$contact->id.'-'.\App\Enums\ContactRole::Student->value}}">{{\App\Enums\ContactRole::Student->value}}</option>
                    <option value="{{$contact->id.'-'.\App\Enums\ContactRole::Evaluator->value}}">{{\App\Enums\ContactRole::Evaluator->value}}</option>
                </select>
                <label for="{{ $contact->id}}">{{ $contact->full_name }}</label>
            </div>
        @endforeach
    </div>
    </div>
    <div>
        <h2 class="font-bold mb-0 pb-1">Liste des projects</h2>
        <div class="grid grid-cols-4 gap-3">
            @foreach($projects as $project)
                <div class="flex gap-2 items-center">
                    <input class="rounded" type="checkbox" name="projects[]" value="{{ $project->id }}"
                           id="{{$project->id}}">
                    <label for="{{ $project->id }}">{{ $project->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <div>
        <x-buttons.main>{{ __("Create this Jiri") }}</x-buttons.main>
    </div>
</form>

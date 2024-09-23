<x-layouts.main>
    <h1 class="font-bold text-2xl">Your Jiris</h1>
    <section>
        <h2 class="font-bold">Upcoming Jiris</h2>
        <x-jiris.list :jiris="$upcomingJiris"/>
    </section>
    <section>
        <h2 class="font-bold">Past Jiris</h2>
        <x-jiris.list :jiris="$pastJiris"/>
    </section>
    <section>
        <a href="/jiri/create" class="p-3 bg-red-500 rounded text-white hover:bg-red-600">Create a new Jiri</a>
    </section>
</x-layouts.main>

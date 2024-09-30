<x-layouts.main>
    <div class="flex gap-3 items-center">
        <h1 class="font-bold text-2xl">{{__('Your Jiris')}}</h1>
        <a href="/jiris/create" class="p-2 text-xs  bg-red-500 rounded text-white hover:bg-red-700">+</a>
    </div>
    <section>
        <h2 class="font-bold">{{__('Upcomings Jiris')}}</h2>
        <x-jiris.list :jiris="$upcomingJiris"/>
    </section>
    <section>
        <h2 class="font-bold">{{__('Pasts Jiris')}}</h2>
        <x-jiris.list :jiris="$pastJiris"/>
    </section>
    <section>
    </section>
</x-layouts.main>

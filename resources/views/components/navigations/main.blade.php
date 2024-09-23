<nav id="main-menu"
     class="font-bold">
    <h2 class="sr-only">{{$title}}</h2>
    <ul class="flex flex-col sm:flex-row gap-4 sm:gap-8 sm:items-center">
        @foreach($links as $link)
            <li>
                <a class=" text-white capitalize tracking-wider hover:underline"
                   href="{{$link['url']}}">{{$link['name']}}</a>
            </li>
        @endforeach
    </ul>
</nav>

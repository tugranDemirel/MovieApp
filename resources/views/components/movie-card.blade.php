<div class="mt-8">
    <a href="{{route('movies.show', $movie['id'])}}">
        <img src="{{$movie['poster_path']}}" alt="{{$movie['title']}}" class="hover:opacity-75 transition ease-in-out duration-150">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$movie['title']}}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span><svg class="fill-current bg-red-500 " width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M32 12.244L20.962 10.56 16 0l-4.962 10.56L0 12.244l7.985 8.176L6.095 32 16 26.53 25.905 32l-1.89-11.58L32 12.244" fill="#000" fill-rule="evenodd"/></svg></span>
            <span class="ml-1">{{$movie['vote_average'] }}%</span>
            <span class="mx-2">|</span>
            <span>{{$movie['release_date']}}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{$movie['genres']}}
        </div>
    </div>
</div>

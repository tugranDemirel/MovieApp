@extends('layouts.main')
@section('content')
{{--    start Movie Info--}}
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{ $movies['poster_path'] }}" alt="{{$movies['title']}}" class="w-64 md:w-96">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movies['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span><svg class="fill-current bg-red-500 " width="12" height="12" xmlns="http://www.w3.org/2000/svg"><path d="M32 12.244L20.962 10.56 16 0l-4.962 10.56L0 12.244l7.985 8.176L6.095 32 16 26.53 25.905 32l-1.89-11.58L32 12.244" fill="#000" fill-rule="evenodd"/></svg></span>
                    <span class="ml-1">{{$movies['vote_average']}}%</span>
                    <span class="mx-2">|</span>
                    <span>{{$movies['release_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{$movies['genres']}}
                    </span>
                </div>

                <p class="text-gray-3000 mt-8">
                    {{$movies['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Cast</h4>
                    <div class="flex mt-4">
                        @foreach($movies['crew'] as $crew)
                            <div class="mr-8">
                                <div>{{$crew['name']}}</div>
                                <div class="text-sm text-gray-400 mt-1">{{$crew['job']}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{isOpen: false}">
                    @if(count($movies['videos']['results']) > 0)
                        <div class="mt-12">
                            <button @click="isOpen=true" class="flex inline-flex items-center bg-red-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-red-300 transition ease-in-out duration-150">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8-8 8z"/>
                                </svg>
                                <div class="ml-2">Fragman</div>
                            </button>
                        </div >
                    @endif
                    <div class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto" style="background-color: rgba(0,0,0, .5);" x-show.transition.opacity="isOpen">
                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-2">
                                    <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe src="https://www.youtube.com/embed/{{$movies['videos']['results'][0]['key']}}" width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" style="border: 0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
{{--    end movie info--}}
    <div class="movie-cast border-b brder-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Oyuncular</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16 ">
                @foreach($movies['cast'] as $cast)
                    <div class="mt-8">
                        <a href="#">
                            <img src="{{'https://image.tmdb.org/t/p/w500'.$cast['profile_path']}}" alt="{{$cast['name']}}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <span>{{$cast['character']}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="movie-image">
        <div class="movie-cast border-b brder-gray-800" x-data="{isOpen:false, image:''}">
            <div class="container mx-auto px-4 py-16">
                <h2 class="text-4xl font-semibold">Resimler</h2>

                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 ">
                    @foreach($movies['images'] as $image)
                            <div class="mt-8">
                                <a @click.prevent="isOpen = true image='{{'https://image.tmdb.org/t/p/original/'.$image['file_path']}}'" href="{{'https://image.tmdb.org/t/p/w500'.$image['file_path']}}">
                                    <img src="{{'https://image.tmdb.org/t/p/w500'.$image['file_path']}}" alt="{{$movies['title']}}" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                    @endforeach

                </div>
                <div style="background-color: rgba(0,0,0, .5);" class="fixed top-0 left-0 h-full w-full flex items-center shadow-lg overflow-y-auto" x-show="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button @click="isOpen = false" @keydown..escape.window="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <div class="responsive-container overflow-hidden relative" style=" padding-top: 56.25%">
                                    <img :src="image" alt="poster">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

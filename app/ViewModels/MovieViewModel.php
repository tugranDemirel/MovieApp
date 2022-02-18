<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movies;

    public function __construct($movies)
    {
        $this->movies = $movies;
    }

    public function movies()
    {

        return collect($this->movies)->merge([
            'poster_path'=>'https://image.tmdb.org/t/p/w500'.$this->movies['poster_path'],
            'vote_average'=> $this->movies['vote_average']*10,
            'release_date'=>\Carbon\Carbon::parse($this->movies['release_date'])->format('M d, Y'),
            'genres'=>collect($this->movies['genres'])->pluck('name')->flatten()->implode(', '),
            'crew'=>collect($this->movies['credits']['crew'])->take(2),
            'cast'=>collect($this->movies['credits']['cast'])->take(5),
            'images'=>collect($this->movies['images']['backdrops'])->take(9),
        ])->only([
            'poster_path',
            'id',
            'genre_ids',
            'title',
            'vote_average',
            'overview',
            'release_date',
            'genres',
            'crew',
            'cast',
            'videos',
            'images',
        ]);
    }
}

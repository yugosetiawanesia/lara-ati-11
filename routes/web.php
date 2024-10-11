<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Yugoslavia', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Yugoslavia',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Est odit laudantium earum cumque pariatur facilis vitae nulla esse quasi
            accusantium! Est iste facilis magnam dolor soluta, maxime quo architecto earum!'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Yugoslavia',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et inventore
            qui perferendis tenetur laborum cum explicabo maxime impedit, aliquam possimus.'
        ],
    ]]);
});

Route::get('/posts/{slug}', function($slug){
    $posts = [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Yugoslavia',
            'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Est odit laudantium earum cumque pariatur facilis vitae nulla esse quasi
            accusantium! Est iste facilis magnam dolor soluta, maxime quo architecto earum!'
        ],
        [
            'id' => 2,
            'title' => 'Judul Artikel 2',
            'slug' => 'judul-artikel-2',
            'author' => 'Yugoslavia',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et inventore
            qui perferendis tenetur laborum cum explicabo maxime impedit, aliquam possimus.'
        ],
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });
// dd($post);
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
